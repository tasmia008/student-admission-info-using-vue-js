<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GhostController extends Controller
{
    public function index()
    {
        return response()->json([
            'status' => 'Connected To Backend',
        ]);
    }
}
