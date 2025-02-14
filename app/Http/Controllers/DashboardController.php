<?php
namespace App\Http\Controllers;
use App\Models\Student;
use App\Models\University;
class DashboardController extends Controller
{
    public function index()
    {
        // Get the total count of students and universities
        $studentsCount = Student::count();
        $universitiesCount = University::count();
        // Return the dashboard view with the data
        return view('dashboard', compact('studentsCount', 'universitiesCount'));
    }
}