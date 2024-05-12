<?php

namespace App\Http\Controllers;

use App\Models\Docent;
use Illuminate\Http\Request;
use PhpParser\Comment\Doc;

class DocentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $docent = Docent::paginate(10);
        $data = [
            'docent' => $docent,
            'status' => 200,
        ];
        return response()->json($data, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $docent = Docent::create($request->all());
        if (!$docent) {
            $data = [
                'message' => 'Docent not found!',
                'status' => 404
            ];
            return response()->json($data, 404);
        }
        $data = [
            'docent' => $docent,
            'status' => 201
        ];
        return response()->json($data, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Docent $docent)
    {
        $docent = Docent::find($docent->id);
        if (!$docent) {
            $data = [
                'message' => 'Docent not found!',
                'status' => 404
            ];
            return response()->json($data, 404);
        }
        $data = [
            'docent' => $docent,
            'status' => 404
        ];
        return response()->json($data, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Docent $docent)
    {
        $docent = Docent::find($docent->id);
        if (!$docent) {
            $data = [
                'message' => 'Docent not found!',
                'status' => 404
            ];
            return response()->json($data, 404);
        }
        $docent->update($request->all());
        $data = [
            'docent' => $docent,
            'status' => 404
        ];
        return response()->json($data, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Docent $docent)
    {
        $docent = Docent::find($docent->id);
        if (!$docent) {
            $data = [
                'message' => 'Docent not found!',
                'status' => 404
            ];
            return response()->json($data, 404);
        }
        $docent->delete();
        return response()->json(null, 204);
    }
}
