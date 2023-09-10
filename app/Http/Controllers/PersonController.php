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
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $validated = $request->validate([
            'name' => 'bail|required',
            'email' => 'required|email',
        ]);
        try {
            $person = Person::create($validated);
            return response()->json($person, 201);
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
        if ($person == null)
            return response()->json("User not found", 404);
        return response()->json($person, 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        $validated = $request->validate([
            'name' => 'bail|required',
            'email' => 'required',
        ]);
        $name = $validated['name'];
        $person = Person::where('name', $name)->first();
        if ($person == null)
            return response()->json("User not found", 404);
        $person->email = $validated['email'];
        $person->save();
        return response()->json($person, 200);
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
        $person->delete();
        return response()->json("User Deleted Successfully", 200);
    }
}
