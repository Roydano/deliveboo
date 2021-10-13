<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Course;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::all();

        return response()->json([
            'success' => true,
            'results' => $courses
        ]);
    }

    /**
     * Display a course 
     *
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $course = Course::where('slug', $slug)->first();

        return response()->json([
            'success' => true,
            'results' => $course
        ]);
    }
}
