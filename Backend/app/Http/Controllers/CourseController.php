<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    // Display a listing of the courses
    public function index()
    {
        $courses = Course::all();
        return view('courses.index', compact('courses'));
    }
    public function show()
    {
        $courses = Course::all();
        return response()->json(['courses'=>$courses]);
    }

    // Show the form for creating a new course
    public function create()
    {
        return view('courses.create');
    }

    // Store a newly created course in the database
    public function store(Request $request)
    {
        //return response()->json(["message"=>$request['name']]) ;
        /*$request->validate([
            'name' => 'required|string|max:255'
        ]);*/

        Course::create($request->all());

        return redirect()->route('admin-dashboard')->with('success', 'Course created successfully.');
    }

}

