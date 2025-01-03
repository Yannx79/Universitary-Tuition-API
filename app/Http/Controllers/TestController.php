<?php

namespace App\Http\Controllers;

use App\Filters\CourseFilter;
use App\Models\Course;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index()
    {
        return view('filters.filter-test');
    }

    public function filters(Request $request, CourseFilter $filters)
    {
        $courses = Course::filter($filters)->get();

        return response()->json([
            'courses' => $courses
        ]);
    }
}
