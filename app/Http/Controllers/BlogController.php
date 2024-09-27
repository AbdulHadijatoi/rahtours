<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Order;
use Illuminate\Http\Request;

class BlogController extends Controller {
    public function index()
    {
        $blogs = Blog::with('contents')->get();

        return view('pages.blogs', compact('blogs'));
    }
    
    public function blogDetail($slug) {
        
        $blog = Blog::with('contents','faqs')->where('slug',$slug)->first();

        if ($blog->banner_image) {
            $blog->banner_image_url = asset($blog->banner_image);
        }

        foreach ($blog->contents as $content) {
            if ($content->image) {
                $content->image_url = asset($content->image);
            }
        }

        return view('pages.blog-details', compact('blog'));
    }
    
}