<?php

namespace App\Http\Controllers\Admin;

use App\Models\{Activity, Category, ActivityPicture};
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Admin\ActivityRequest;
use App\Models\SubCategory;
use App\Models\ActivityInstruction;

class OtherExperianceController extends Controller
{
    public function index()
    {
        $activity = Activity::where('otherexpereience_activity', 1)->get();
        return view('admin.other-experiance.index',compact('activity'));
    }

    public function create()
    {
        $categories = Category::all();
        $subCategories = SubCategory::all();
        return view('admin.other-experiance.create',compact('categories', 'subCategories'));
    }

    public function store(ActivityRequest $request)
    {
        $validatedData = $request->validated();
        $record = Activity::activity($validatedData);

        // Handle multiple images
        if ($request->has('images')) {
            foreach ($request->file('images') as $image) {
                $fileInfo = $image->getClientOriginalName();
                $filename = pathinfo($fileInfo, PATHINFO_FILENAME);
                $extension = pathinfo($fileInfo, PATHINFO_EXTENSION);
                $file_name = $filename . '-' . time() . '.' . $extension;

                // Store the image in 'storage/app/public/uploads'
                $path = $image->storeAs('public/uploads', $file_name);

                // Create a new ActivityPicture record in the database
                $imageUpload = new ActivityPicture();
                $imageUpload->activity_id = $record->id;
                $imageUpload->original_filename = $image->getClientOriginalName();
                $imageUpload->filename = $file_name;
                $imageUpload->save();
            }
        }

        // Handle single image upload (e.g., base64-encoded image)
        if (isset($request->image) && !empty($request->image)) {
            $imageData = $request->image;
            $imageInfo = json_decode($imageData, true);
            $imageName = date('YmdHis') . $imageInfo['name'];
            $imageData = base64_decode($imageInfo['data']);
            Storage::disk('public')->put('uploads/' . $imageName, $imageData);
            Activity::updateImageName($record->id, ['image' => $imageName]);
        }

        // Handle activity instructions
        if (isset($validatedData['instructions']) && is_array($validatedData['instructions'])) {
            foreach ($validatedData['instructions'] as $instructionData) {
                $instructionData['activity_id'] = $record->id;
                ActivityInstruction::create($instructionData);
            }
        }

        return redirect()->route('admin.otherexperiances.index')->with('success', 'Activity added successfully');
    }

    public function destroy(string $id)
    {
        try {
            $activity = Activity::findOrFail($id);
            $activity->delete();
            return redirect()->back()->with('success', 'Activity deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to delete activity: ' . $e->getMessage());
        }
    }

    public function edit(string $id)
    {
        $activity = Activity::findOrFail($id);
        $categories = Category::all();
        $subCategories = SubCategory::all();
        return view('admin.other-experiance.edit',compact('activity', 'categories', 'subCategories'));
    }

    public function update(Request $request, string $id)
    {
        $record = Activity::activityUpdate($id, $request->all());

        // Handle single image upload (e.g., base64-encoded image)
        if (isset($request->image) && !empty($request->image)) {
            $imageData = $request->image;
            $imageInfo = json_decode($imageData, true);
            $imageName = date('YmdHis') . $imageInfo['name'];
            $imageData = base64_decode($imageInfo['data']);
            Storage::disk('public')->put('uploads/' . $imageName, $imageData);
            Activity::updateImageName($record->id, ['image' => $imageName]);
        }

        // Handle activity instructions
        if (isset($request->instructions) && is_array($request->instructions)) {
            foreach ($request->instructions as $instructionData) {
                if (isset($instructionData['instruction_id'])) {
                    $instruction = ActivityInstruction::findOrFail($instructionData['instruction_id']);
                    $instruction->update([
                        'instruction_title' => $instructionData['instruction_title'],
                        'instruction_description' => $instructionData['instruction_description'],
                    ]);
                } else {
                    $instructionData['activity_id'] = $record->id;
                    ActivityInstruction::create($instructionData);
                }
            }
        }

        return redirect()->route('admin.otherexperiances.index')->with('success', 'Activity updated successfully');
    }

    public function createActivityImages($id)
    {
        $activity = Activity::findOrFail($id);
        return view('admin.activity.activity-images.create', compact('activity'));
    }

    public function getImages($id)
    {
        $images = ActivityPicture::where('activity_id', $id)->get();
        $data = [];
        foreach ($images as $image) {
            $obj['name'] = $image->filename;
            $obj['size'] = Storage::disk('public')->size('uploads/' . $image->filename);
            $obj['path'] = Storage::url('uploads/' . $image->filename);
            $data[] = $obj;
        }
        return response()->json($data);
    }

    public function storeImages(Request $request)
    {
        $image = $request->file('file');
        $fileInfo = $image->getClientOriginalName();
        $filename = pathinfo($fileInfo, PATHINFO_FILENAME);
        $extension = pathinfo($fileInfo, PATHINFO_EXTENSION);
        $file_name = $filename . '-' . time() . '.' . $extension;

        // Store the image in 'storage/app/public/uploads'
        $path = $image->storeAs('public/uploads', $file_name);

        // Create a new ActivityPicture record in the database
        $imageUpload = new ActivityPicture();
        $imageUpload->activity_id = $request->activity_id;
        $imageUpload->original_filename = $image->getClientOriginalName();
        $imageUpload->filename = $file_name;
        $imageUpload->save();

        return response()->json(['success' => $file_name]);
    }

    public function destroyImages(Request $request, $id)
    {
        $filename = $request->get('filename');
        $deleted = ActivityPicture::where('filename', $filename)
            ->where('activity_id', $id)
            ->delete();

        if ($deleted) {
            $path = 'public/uploads/' . $filename;
            if (Storage::disk('public')->exists($path)) {
                Storage::disk('public')->delete($path);
                return response()->json(['success' => $filename]);
            } else {
                return response()->json(['error' => 'File not found'], 404);
            }
        } else {
            return response()->json(['error' => 'Image not found'], 404);
        }
    }
}
