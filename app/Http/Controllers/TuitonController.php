<?php

namespace App\Http\Controllers;

use App\Models\Tuiton;
use Illuminate\Http\Request;

class TuitonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tuiton = Tuiton::paginate(10);
        $data = [
            'tuiton' => $tuiton,
            'status' => 200,
        ];
        return response()->json($data, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $tuiton = Tuiton::create($request->all());
        if (!$tuiton) {
            $data = [
                'message' => 'Tuition not found!',
                'status' => 404
            ];
            return response()->json($data, 404);
        }
        $data = [
            'tuiton' => $tuiton,
            'status' => 201
        ];
        return response()->json($data, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Tuiton $tuiton)
    {
        $tuiton = Tuiton::find($tuiton);
        if (!$tuiton) {
            $data = [
                'message' => 'Tuition not found!',
                'status' => 404
            ];
            return response()->json($data, 404);
        }
        $data = [
            'tuiton' => $tuiton,
            'status' => 404
        ];
        return response()->json($data, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tuiton $tuiton)
    {
        $tuiton = Tuiton::find($tuiton);
        if (!$tuiton) {
            $data = [
                'message' => 'Tuition not found!',
                'status' => 404
            ];
            return response()->json($data, 404);
        }
        $tuiton->update($request->all());
        $data = [
            'tuiton' => $tuiton,
            'status' => 404
        ];
        return response()->json($data, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tuiton $tuiton)
    {
        $tuiton = Tuiton::find($tuiton);
        if (!$tuiton) {
            $data = [
                'message' => 'Tuition not found!',
                'status' => 404
            ];
            return response()->json($data, 404);
        }
        $tuiton->delete();
        return response()->json(null, 204);
    }
}
