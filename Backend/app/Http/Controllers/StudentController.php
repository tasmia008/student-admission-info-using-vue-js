<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Support\Facades\Session;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();
        return response()->json([
            'students' => $students
        ]);
    }

    /**
     * Update the student's course state.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request ,$id)
    {
        
        $student = Student::find($id);
        $student->state = $request->state;
        $student->save();

        return response()->json([
            'message' => 'Student state updated successfully',
            'student' => $student

        ]);

    }

    /**
     * Store a newly created student in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            // Create the student
            $student = Student::create([
                'name' => $request->name,
                'course_id' => $request->course,
                'email' => $request->email,
                'state' => 'pending',
                'password' => $request->password, // Store the password directly
            ]);

            return response()->json([
                'message' => 'Student registered successfully',
                'student' => $student
            ], 201); // Use 201 status code for successful creation
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Student registration failed',
                'error' => $e->getMessage()
            ], 500); // Use 500 status code for server error
        }
    }

    /**
     * Login a student or admin.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        // Validate the request
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string'
        ]);

        // Check if the admin is logging in
        if ($request->email === 'admin@gmail.com' && $request->password === 'admin') {
            // Store admin session
            Session::put('admin', true);
            return response()->json([
                'message' => 'Login successful as admin',
                'user' => 'admin',
                "id"=>1 ,
                'email'=>'admin@gmail.com',
                'role' => 'admin'
             //   'redirect' => '/admindashboard'
            ]);
        }
 
        // Attempt to find the student by email
        $student = Student::where('email', $request->email)->first();

        if ($student && $request->password === $student->password)
         {
            // Store student session
            Session::put('student', $student);
            return response()->json([
                'message' => 'Login successful',
                'student' => $student,
                "id"=>$student->id ,
                'role' => 'student'
//'redirect' => '/studentdasboard'
            ]);
        } else {
            // Invalid credentials
            return response()->json([
                'message' => 'Invalid email or password'
            ], 401); // 401 Unauthorized status code
        }
    }

    public function 
    dashboard()
    {
        if (!Session::has('student')) {
            return response()->json([
                'message' => 'Please login first',
                'redirect' => route('login')
            ], 401); // 401 Unauthorized status code
        }

        $student = Session::get('student');
        return response()->json([
            'student' => $student
        ]);
    }

    /**
     * Logout the student or admin.
     *
     * @return \Illuminate\Http\Response
     */
    public function logout()
    {
        Session::forget('student');
        Session::forget('admin');
        return response()->json([
            'message' => 'Logged out successfully',
            'redirect' => route('login')
        ]);
    }
    public function findstudentinfo($id)
    {
        // $studentId = $id->input('id');
    
    // Find the student by ID using the Student model
    $student = Student::find($id) ;

        return response()->json([
            "student"=>$student 
        ]) ;

        }
     public function findadmin($id)
     {
            $students = Student::all();

            return response()->json([
                "students"=>$students 
            ]) ;
        }

        // public function updatestate()
        // {
        //     $students = Student::all();
    
        //   //  $students = Student::where('email', 'admin@gmail.com')->where('password', 'admin')->first();
    
        //   //  if ($admin) {
        //         return view('admin', compact('$students'));
        //     // } else {
        //     //    return view('users.index', compact('users'));
        //     // }
        // }

}
