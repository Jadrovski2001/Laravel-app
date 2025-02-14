<?php
    
namespace App\Http\Controllers;
    
use App\Models\Student;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;
use App\Http\Requests\StudentStoreRequest;
use App\Http\Requests\StudentUpdateRequest;
use App\Models\University;


class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        
        $students = Student::with('university')->latest()->paginate(5);


          
        return view('students.index', compact('students'))
                    ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('students.create');
    }
    
    /**
     * Store a newly created resource in storage.
     */
    public function store(StudentStoreRequest $request): RedirectResponse
    {
        //dd($request);
        // Handle image upload
        $imagePath = null;
        if ($request->hasFile('image')) {
            // Store the image in the 'images' folder within the 'public' disk
            $imagePath = $request->file('image')->store('images', 'public');
            $imageName = $request->image->hashName();
            //dd($imageName);
        }

        // Create the student and save the image path
        Student::create([
            'name' => $request->name,
            'detail' => $request->detail,
            'image' => $imageName,  // Store the image path in the database
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
        return view('students.edit', compact('student'));
    }
  
    /**
     * Update the specified resource in storage.
     */
    public function update(StudentUpdateRequest $request, Student $student): RedirectResponse
{
    // Retain the old image path if no new image is uploaded
    $imagePath = $student->image;

    // Check if a new image is uploaded
    if ($request->hasFile('image')) {
        // Delete the old image if a new one is uploaded and it's not a default image
        if ($imagePath && $imagePath != 'default.png') {
            // Delete the old image from the 'storage/images' folder
            $oldImagePath = storage_path('app/public/images/' . $imagePath);
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }
        }

        // Store the new image in the 'storage/images' folder and get the filename
        $imagePath = $request->file('image')->getClientOriginalName();
        $request->file('image')->storeAs('images', $imagePath, 'public');  // Store in 'storage/app/public/images'
    }

    // Update the student with the new image path (if any)
    $student->update([
        'name' => $request->name,
        'detail' => $request->detail,
        'image' => $imagePath,
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
            \Storage::disk('public')->delete($student->image);
        }
        
        $student->delete();
           
        return redirect()->route('students.index')
                         ->with('success', 'Student deleted successfully.');
    }
}
