<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Helpers\UploadFiles;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    private $model = null;

    public function __construct()
    {
        $this->model = new Category();
    }

    public function index()
    {
        $categories = $this->model::all();
        return view('admin.category.list', compact('categories'));
    }


    public function create()
    {
        return view('admin.category.add');
    }


    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'name' => 'required|string|max:255|unique:categories',
                'image' => 'required'
            ]);

            // Generate slug from name
            $slug = Str::slug($validatedData['name']);

            $category = $this->model::create([
                'name' => $validatedData['name'],
                'slug' => $slug,  // Add slug to the category
                'image' => UploadFiles::upload($request->image, 'image', 'category_image')
            ]);

            if ($category) {
                return redirect()->route('admin.categories.index')->with('success', 'Category added successfully.');
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }


    public function show(string $id)
    {
        try {
            // Find the category by ID
            $category = $this->model::find($id);
            if ($category->image) {
                $oldImagePath = public_path('storage/category_image/' . basename($category->image));
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }
            $category->delete();

            return redirect()->route('admin.categories.index')->with('success', 'Category deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }


    public function edit(string $id)
    {
        $category = $this->model::find($id);
        return view('admin.category.update', compact('category'));
    }


    public function update(Request $request, string $id)
    {
        try {
            $category = $this->model::find($id);
            $validatedData = $request->validate([
                'name' => 'required|string|max:255|unique:categories,name,' . $id,
                'image' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg'
            ]);

            // Generate slug from the updated name
            $slug = Str::slug($validatedData['name']);

            if ($request->hasFile('image') && $request->file('image')->isValid()) {
                if ($category->image) {
                    $oldImagePath = public_path('storage/category_image/' . basename($category->image));
                    if (file_exists($oldImagePath)) {
                        unlink($oldImagePath);
                    }
                }
                $newImagePath = UploadFiles::upload($request->file('image'), 'image', 'category_image');
                $newImageURL = url('storage/category_image/' . basename($newImagePath));
            }

            $update = $category->update([
                'name' => $validatedData['name'],
                'slug' => $slug,  // Update slug with the new name
                'image' => $newImageURL ?? $category->image
            ]);

            if ($update) {
                return redirect()->route('admin.categories.index')->with('success', 'Category updated successfully.');
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }



}