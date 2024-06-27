<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Userr;
use App\Models\Student;


class UserrController extends Controller
{
    public function index()
    {
        $users = Userr::all();

        // Check if there is a user with email 'admin@gmail.com' and password 'admin'
        $admin = Userr::where('email', 'admin@gmail.com')->where('password', 'admin')->first();

        if ($admin) {
            // Fetch all students if admin is logged in
            $students = Student::all();
            return view('admin', compact('students', 'users'));
        } else {
            return view('users.index', compact('users'));
        }
    }
}
