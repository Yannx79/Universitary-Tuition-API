<?php

namespace App\Http\Controllers;

use App\Models\Person;
use Illuminate\Http\Request;

class PersonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $person = Person::paginate(10);
        $data = [
            'person' => $person,
            'status' => 200,
        ];
        return response()->json($data, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $person = Person::create($request->all());
        if (!$person) {
            $data = [
                'message' => 'Person not found!',
                'status' => 404
            ];
            return response()->json($data, 404);
        }
        $data = [
            'person' => $person,
            'status' => 201
        ];
        return response()->json($data, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Person $person)
    {
        $person = Person::find($person->id);
        if (!$person) {
            $data = [
                'message' => 'Person not found!',
                'status' => 404
            ];
            return response()->json($data, 404);
        }
        $data = [
            'person' => $person,
            'status' => 200
        ];
        return response()->json($data, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Person $person)
    {
        $person = Person::find($person->id);
        if (!$person) {
            $data = [
                'message' => 'Person not found!',
                'status' => 404
            ];
            return response()->json($data, 404);
        }
        $person->update($request->all());
        $data = [
            'person' => $person,
            'status' => 200
        ];
        return response()->json($data, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Person $person)
    {
        $person = Person::find($person->id);
        if (!$person) {
            $data = [
                'message' => 'Person not found!',
                'status' => 404
            ];
            return response()->json($data, 404);
        }
        $person->delete();
        return response()->json(null, 204);
    }
}
