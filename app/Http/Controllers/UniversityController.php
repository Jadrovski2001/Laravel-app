<?php

namespace App\Http\Controllers;

use App\Models\University;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Http\Requests\UniversityStoreRequest;
use App\Http\Requests\UniversityUpdateRequest;

class UniversityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $universities = University::latest()->paginate(5);

        return view('universities.index', compact('universities'))
                    ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('universities.create');
    }
    
    /**
     * Store a newly created resource in storage.
     */
    public function store(UniversityStoreRequest $request): RedirectResponse
    {
        // Handle image upload
        $imageName = null;
        if ($request->hasFile('image')) {
            // Store the image in the 'images' folder within the 'public' disk
            $imageName = $request->image->hashName();  // Using hashName to avoid name collision
            $request->file('image')->storeAs('images', $imageName, 'public');  // Store image in public storage
        }

        // Create the university and save the image path
        University::create([
            'name' => $request->name,
            'address' => $request->address,  // Replaced 'detail' with 'address'
            'image' => $imageName,  // Store the image path in the database
        ]);

        return redirect()->route('universities.index')
                         ->with('success', 'University created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(University $university): View
    {
        return view('universities.show', compact('university'));
    }
  
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(University $university): View
    {
        return view('universities.edit', compact('university'));
    }
  
    /**
     * Update the specified resource in storage.
     */
    public function update(UniversityUpdateRequest $request, University $university): RedirectResponse
    {
        // Retain the old image path if no new image is uploaded
        $imageName = $university->image;

        // Check if a new image is uploaded
        if ($request->hasFile('image')) {
            // Delete the old image if a new one is uploaded and it's not a default image
            if ($imageName && $imageName != 'default.png') {
                // Delete the old image from the 'storage/images' folder
                $oldImagePath = storage_path('app/public/images/' . $imageName);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }

            // Store the new image in the 'storage/images' folder and get the filename
            $imageName = $request->image->hashName();  // Using hashName to avoid name collision
            $request->file('image')->storeAs('images', $imageName, 'public');  // Store image in public storage
        }

        // Update the university with the new image path (if any)
        $university->update([
            'name' => $request->name,
            'address' => $request->address,  // Replaced 'detail' with 'address'
            'image' => $imageName,  // Store the image path in the database
        ]);

        return redirect()->route('universities.index')
                         ->with('success', 'University updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(University $university): RedirectResponse
    {
        // Delete the image if it exists
        if ($university->image) {
            \Storage::disk('public')->delete('images/' . $university->image);
        }
        
        $university->delete();
        
        return redirect()->route('universities.index')
                         ->with('success', 'University deleted successfully.');
    }
}  