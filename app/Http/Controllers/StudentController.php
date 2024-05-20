<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\CourseStudent;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $student = Student::paginate(10);
        $data = [
            'student' => $student,
            'status' => 200,
        ];
        return response()->json($data, 200);
    }

    public function getCourses(Student $student)
    {
        $student = Student::find($student->id);

        if (!$student) {
            $data = [
                'message' => 'Courses not found!',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $courses = [];
        foreach ($student->courses_students as $coursesStudent) {
            $course = $coursesStudent->course;
            $courses[] = $course;
        }
        $data = [
            'courses' => $courses,
            'status' => 200
        ];

        return response()->json($data, 200);
    }

    public function getCoursesApproved(Student $student)
    {
        $student = Student::find($student->id);

        if (!$student) {
            $data = [
                'message' => 'Courses not found!',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $coursesStudents = CourseStudent::approved()->where('student_id', $student->id)->get();

        $courses = [];
        foreach ($coursesStudents as $coursesStudent) {
            $course = $coursesStudent->course;
            $courses[] = [
                'id' => $course->id,
                'name' => $course->name,
                'note' => $coursesStudent->note
            ];
        }

        $data = [
            'courses' => $courses,
            'status' => 200
        ];

        return response()->json($data, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $student = Student::create($request->all());
        if (!$student) {
            $data = [
                'message' => 'Student not found!',
                'status' => 404
            ];
            return response()->json($data, 404);
        }
        $data = [
            'student' => $student,
            'status' => 201
        ];
        return response()->json($data, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        $student = Student::find($student->id);
        if (!$student) {
            $data = [
                'message' => 'Tuition not found!',
                'status' => 404
            ];
            return response()->json($data, 404);
        }
        $data = [
            'student' => $student,
            'status' => 200
        ];
        return response()->json($data, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        $student = Student::find($student->id);
        if (!$student) {
            $data = [
                'message' => 'Student not found!',
                'status' => 404
            ];
            return response()->json($data, 404);
        }
        $student->update($request->all());
        $data = [
            'student' => $student,
            'status' => 200
        ];
        return response()->json($data, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        $student = Student::find($student->id);
        if (!$student) {
            $data = [
                'message' => 'Student not found!',
                'status' => 404
            ];
            return response()->json($data, 404);
        }
        $student->delete();
        return response()->json(null, 204);
    }
}
