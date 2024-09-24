<?php

namespace App\Http\Controllers\Admin\Setting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Homeimage;
use App\Models\Setting;
use Illuminate\Http\UploadedFile;

class HomeController extends Controller
{
    public function index()
    {
        $homeimages = Homeimage::all();
        return view('admin.setting.home.list', compact('homeimages'));
    }

    public function create()
    {
        return view('admin.setting.home.add');
    }


    public function store(Request $request)
    {
        try {
            $imagePath = $this->uploadImage($request->image);
            $homeimage = Homeimage::create([
                'image' => $imagePath,
                'image_url' =>url($imagePath),
            ]);

            Setting::where('id', 1)->update(['hero_image' => $imagePath]);

            return redirect()->route('homeimages.index');
        } catch (\Exception $e) {
            throw $e;
        }
    }

    public function edit($id)
    {
        $data = Homeimage::findOrFail($id);
        
        return view('admin.setting.home.update', compact('data'));
    }

    public function update(Request $request, $id)
    {
        try {
            $homeimage = Homeimage::findOrFail($id);

            if (isset($request->image)) {
                $this->deleteImage($homeimage->image);
            }

            if (isset($request->image)) {
                $imagePath = $this->uploadImage($request->image);
                $homeimage->image = $imagePath;
                $homeimage->image_url = url($imagePath);
                Setting::where('id', 1)->update(['hero_image' => $imagePath]);
            }

            $homeimage->save();


            return redirect()->route('homeimages.index');

        } catch (\Exception $e) {
            throw $e;
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function show($id)
    {
        try {
            $category = Homeimage::findOrFail($id);
            $this->deleteImage($category->image);
            $category->delete();
            return back();
        } catch (\Exception $e) {
            throw $e;
        }
    }
    private function deleteImage($imagePath)
    {
        if (file_exists($imagePath)) {
            unlink(public_path($imagePath));
        }
    }
    
    private function uploadImage(UploadedFile $file)
    {
        $imageName = uniqid() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('home_image/'), $imageName);
        return 'home_image/' . $imageName;
    }

   

}
