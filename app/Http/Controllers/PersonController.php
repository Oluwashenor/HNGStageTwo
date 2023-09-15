<?php

namespace App\Http\Controllers;

use App\Models\Person;
use Illuminate\Http\Request;
use stdClass;

class PersonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
        ]);

        $emailExist = Person::where('email', $validated['email'])->exists();
        $nameExist = Person::where('name', $validated['name'])->exists();

        if ($emailExist) {
            $response = [
                'message' => 'Email Exists',
                'status' => 422
            ];
            return response()->json($response, 422);
        }

        if ($nameExist) {
            $response = [
                'message' => 'Name Exists',
                'status' => 422
            ];
            return response()->json($response, 422);
        }

        try {
            $person = Person::create($validated);
            $response = [
                'status' => 201,
                'data' => $person,
                'message' => 'User Created Successfully',
            ];
            return response()->json($response, 201);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Something went wrong.'], 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $person = Person::find($id);
        if ($person == null) {
            $response = [
                'message' => 'User not found',
                'status' => 404
            ];
            return response()->json($response, 404);
        }
        $response = [
            'status' => 200,
            'data' => $person,
            'message' => 'User Retreived',
        ];
        return response()->json($response);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, $parameter)
    {
        if (!$parameter) {
            return response()->json(['message' => 'Invalid input. Provide either $id or $name.'], 400);
        }
        $validated = $request->validate([
            'name' => '',
            'email' => '',
        ]);
        if (is_numeric($parameter)) {
            $person = Person::find($parameter);
        } else {
            $person = Person::where('name', $parameter)->first();
        }
        if ($person == null) {
            $response = [
                'message' => 'User not found',
                'status' => 404
            ];
            return response()->json($response, 404);
        }
        if ($validated['email']) {
            $person->email = $validated['email'];
        }
        if ($validated['name']) {
            $person->name = $validated['name'];
        }
        $person->save();
        $response = [
            'status' => 200,
            'data' => $person,
            'message' => 'User Updated Successfully',
        ];
        return response()->json($response, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Person $person)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $person = Person::find($id);
        if (!$person)
            if ($person == null) {
                $response = [
                    'message' => 'User not found',
                    'status' => 404
                ];
                return response()->json($response, 404);
            }
        $person->delete();
        $response = [
            'status' => 200,
            'message' => 'User Deleted successfully',
        ];
        return response()->json($response, 200);
    }
}
