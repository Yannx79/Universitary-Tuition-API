<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $course = Course::paginate(10);
        $data = [
            'course' => $course,
            'status' => 200,
        ];
        return response()->json($data, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $course = Course::create($request->all());
        if (!$course) {
            $data = [
                'message' => 'Course not found!',
                'status' => 404
            ];
            return response()->json($data, 404);
        }
        $data = [
            'course' => $course,
            'status' => 201
        ];
        return response()->json($data, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        $course = Course::find($course->id);
        if (!$course) {
            $data = [
                'message' => 'Course not found!',
                'status' => 404
            ];
            return response()->json($data, 404);
        }
        $data = [
            'course' => $course,
            'status' => 404
        ];
        return response()->json($data, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Course $course)
    {
        $course = Course::find($course->id);
        if (!$course) {
            $data = [
                'message' => 'Course not found!',
                'status' => 404
            ];
            return response()->json($data, 404);
        }
        $course->update($request->all());
        $data = [
            'course' => $course,
            'status' => 404
        ];
        return response()->json($data, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        $course = Course::find($course->id);
        if (!$course) {
            $data = [
                'message' => 'Course not found!',
                'status' => 404
            ];
            return response()->json($data, 404);
        }
        $course->delete();
        return response()->json(null, 204);
    }
}
