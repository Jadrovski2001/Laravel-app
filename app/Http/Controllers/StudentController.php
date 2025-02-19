<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\University;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

use Illuminate\View\View;
use App\Http\Requests\StudentStoreRequest;
use App\Http\Requests\StudentUpdateRequest;



class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        // Retrieve students with their university and paginate
        $students = Student::with('university')->latest()->paginate(5);

        
        return view('students.index', compact('students'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $universities = University::all();
        return view('students.create' , compact('universities'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StudentStoreRequest $request): RedirectResponse
    
    {

        // Handle image upload
        $imageName = null;
        if ($request->hasFile('image')) {
            // Store the image directly in the 'public/images' folder
            $imageName = $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('images'), $imageName);
        }

        // Create the student and save the image path
        Student::create([
            'name' => $request->name,
            'detail' => $request->detail,
            'image' => $imageName,  // Store the image path in the database
            'university_id' => $request->university_id,  // Store university_id
        ]);

        return redirect()->route('students.index')
            ->with('success', 'Student created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student): View
    {
        return view('students.show', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student): View
    {
        $universities = University::all();
        return view('students.edit', compact('student', 'universities'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StudentUpdateRequest $request, Student $student): RedirectResponse
    {
        // Retain the old image path if no new image is uploaded
        $imageName = $student->image;

        // Check if a new image is uploaded
        if ($request->hasFile('image')) {
            // Delete the old image if a new one is uploaded and it's not a default image
            if ($imageName && $imageName != 'default.png') {
                $oldImagePath = public_path('images/' . $imageName);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }

            // Store the new image and get the filename
            $imageName = $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('images'), $imageName);
        }

        // Update the student with the new image path (if any)
        $student->update([
            'name' => $request->name,
            'detail' => $request->detail,
            'image' => $imageName,  // Store the image path in the database
            'university_id' => $request->university_id,
        ]);

        return redirect()->route('students.index')
            ->with('success', 'Student updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student): RedirectResponse
    {
        // Delete the image if it exists
        if ($student->image) {
            $imagePath = public_path('images/' . $student->image);
            if (file_exists($imagePath)) {
                unlink($imagePath);  // Delete the image file
            }
        }

        $student->delete();

        return redirect()->route('students.index')
            ->with('success', 'Student deleted successfully.');
    }
}
