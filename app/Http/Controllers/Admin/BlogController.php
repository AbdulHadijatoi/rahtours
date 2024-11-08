<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\SitemapController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\BlogContent;
use App\Models\Faq;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = Blog::with('contents', 'faqs')->get();
        return view('admin.blog.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.blog.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'banner_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'contents.*.title' => 'required',
            'contents.*.description' => 'required',
            'contents.*.image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'faqs.*.question' => 'required|max:225',
            'faqs.*.answer' => 'required',
        ]);

        // Upload the banner image to the 'uploads/blog' folder inside storage/app/public/uploads
        $bannerImageAddress = null;
        if ($request->hasFile('banner_image')) {
            $bannerImage = $request->file('banner_image');
            $bannerImageName = uniqid() . '.' . $bannerImage->getClientOriginalExtension();
            $bannerImagePath = $bannerImage->storeAs('uploads/blog', $bannerImageName, 'public'); // Stores under storage/app/public/uploads/blog
            $bannerImageAddress = 'storage/' . $bannerImagePath; // This creates a link accessible via public/storage/uploads/blog
        }

        // Create the blog record
        $blog = Blog::create([
            'title' => $request->title,
            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description,
            'meta_keywords' => $request->meta_keywords,
            'slug' => Str::slug($request->title),
            'description' => $request->description,
            'banner_image' => $bannerImageAddress,
        ]);

        // Handle blog contents
        if ($request->has('contents')) {
            foreach ($request->contents as $content) {
                $contentImageAddress = null;
                if (isset($content['image']) && $content['image']) {
                    $contentImage = $content['image'];
                    $contentImageName = uniqid() . '.' . $contentImage->getClientOriginalExtension();
                    $contentImagePath = $contentImage->storeAs('uploads/blog_contents', $contentImageName, 'public');
                    $contentImageAddress = 'storage/' . $contentImagePath;
                }

                $blog->contents()->create([
                    'title' => $content['title'],
                    'description' => $content['description'],
                    'image' => $contentImageAddress,
                ]);
            }
        }

        // Handle blog FAQs
        if ($request->has('faqs')) {
            foreach ($request->faqs as $faq) {
                $blog->faqs()->create($faq);
            }
        }

        (new SitemapController())->generateSitemap();

        return redirect()->route('admin.blogs.index')->with('success', 'Blog created successfully');
    }



    public function show(Blog $blog)
    {

    }

    public function edit($id)
    {
        $blog = Blog::findOrFail($id);
        $contents = $blog->contents;
        $faqs = $blog->faqs;
        return view('admin.blog.edit', compact('blog','contents','faqs'));
    }

    public function update(Request $request, Blog $blog)
    {
        
        $blogData = [
            'title' => $request->input('title'),
            'meta_title' => $request->input('meta_title'),
            'meta_description' => $request->input('meta_description'),
            'meta_keywords' => $request->input('meta_keywords'),
            'description' => $request->input('description'),
        ];

        // Update the banner image
        if ($request->hasFile('banner_image')) {

            if ($blog->banner_image && file_exists(public_path($blog->banner_image))) {
                unlink(public_path($blog->banner_image));
            }

            $bannerImage = $request->file('banner_image');

            $bannerImageName = uniqid() . '.' . $bannerImage->getClientOriginalExtension();
            $bannerImagePath = $bannerImage->storeAs('uploads/blog', $bannerImageName, 'public');
            $blogData['banner_image'] = 'storage/' . $bannerImagePath;
        }

        // Update the blog record
        $blog->update($blogData);

        // Update blog contents
        if ($request->has('content_titles')) {
            $contentTitles = $request->input('content_titles');
            $contentDescriptions = $request->input('content_descriptions');
            $contentImages = $request->file('content_images');

            foreach ($contentTitles as $index => $title) {
                $content = $blog->contents[$index] ?? new BlogContent();

                $content->title = $title;
                $content->description = $contentDescriptions[$index];

                if (isset($contentImages[$index])) {
                    // if ($content->image && file_exists(public_path($content->image))) {
                    //     unlink(public_path($content->image));
                    // }
                    $contentImage = $contentImages[$index];
                    $contentImageName = uniqid() . '.' . $contentImage->getClientOriginalExtension();
                    $contentImagePath = $contentImage->storeAs('uploads/blog_contents', $contentImageName, 'public');
                    $content->image = 'storage/' . $contentImagePath;
                }

                $blog->contents()->save($content);
            }
        }

        // Update blog FAQs
        if ($request->has('faqs')) {
            $faqs = $request->input('faqs');

            foreach ($faqs as $index => $faqData) {
                $faq = $blog->faqs[$index] ?? new Faq();

                $faq->question = $faqData['question'];
                $faq->answer = $faqData['answer'];

                $blog->faqs()->save($faq);
            }
        }
        (new SitemapController())->generateSitemap();
        return redirect()->route('admin.blogs.index')->with('success', 'Blog updated successfully');
    }



    public function destroy(Blog $blog)
    {
        if ($blog->banner_image && file_exists(public_path($blog->banner_image))) {
            unlink(public_path($blog->banner_image));
        }

        foreach ($blog->contents as $content) {
            if ($content->image && file_exists(public_path($content->image))) {
                unlink(public_path($content->image));
            }
        }

        $blog->delete();
        return redirect()->route('admin.blogs.index')->with('success', 'Blog deleted successfully');
    }

            public function viewContents($id)
        {
            $blog = Blog::with('contents')->findOrFail($id);
            return view('admin.blog.contents-index', compact('blog'));
        }

        public function viewFaqs($id)
        {
            $blog = Blog::with('faqs')->findOrFail($id);
            return view('admin.blog.faqs-index', compact('blog'));
        }

        public function editContents(BlogContent $content)
        {
            return view('admin.blog.contents-edit', compact('content'));
        }
        public function updateContents(Request $request, BlogContent $content)
        {


            $contentData = $request->only('title', 'description');

            if ($request->hasFile('image')) {
                if ($content->image && file_exists(public_path($content->image))) {
                    unlink(public_path($content->image));
                }

                $image = $request->file('image');
                $imageName = uniqid() . '.' . $image->getClientOriginalExtension();
                $imagePath = $image->move(public_path('blog_contents'), $imageName);
                $contentData['image'] = 'blog_contents/' . $imageName;
            }

            $content->update($contentData);

            return redirect()->route('admin.blogs.index')->with('success', 'Content updated successfully');
        }

        public function destroyContents(BlogContent $content)
        {
            if ($content->image && file_exists(public_path($content->image))) {
                unlink(public_path($content->image));
            }
            $content->delete();
            return redirect()->back()->with('success', 'Content deleted successfully');
        }



        public function editFaqs(Faq $faq)
        {
            return view('admin.blog.faqs-edit', compact('faq'));
        }

        public function updateFaqs(Request $request, Faq $faq)
        {
            $faqData = $request->only('question', 'answer');
            $faq->update($faqData);

            return redirect()->route('admin.blogs.index')->with('success', 'FAQ updated successfully');
        }

        public function destroyFaqs(Faq $faq)
        {
            $faq->delete();
            return redirect()->back()->with('success', 'FAQ deleted successfully');
        }

}