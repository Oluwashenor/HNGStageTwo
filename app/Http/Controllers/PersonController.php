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
            'name' => 'required',
            'email' => 'required|email',
        ]);

        $emailExist = Person::where('email', $validated['email'])->exists();
        $nameExist = Person::where('name', $validated['name'])->exists();

        if ($emailExist) {
            return response()->json(['error' => 'Email Already Exist.'], 422);
        }

        if ($nameExist) {
            return response()->json(['error' => 'Name Already Exist.'], 422);
        }

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
    public function show($name)
    {
        $person = Person::where('name', $name)->first();;
        if ($person == null)
            return response()->json("User not found", 404);
        return response()->json($person, 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => '',
            'email' => '',
        ]);
        $person = Person::find($id);
        if ($person == null)
            return response()->json("User not found", 404);
        if ($validated['email']) {
            $emailExist = Person::where('email', $validated['email'])->exists();

            $person->email = $validated['email'];
        }
        if ($validated['name']) {
            $person->name = $validated['name'];
        }
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
        if (!$person)
            return response()->json("User not found", 404);
        $person->delete();
        return response()->json("User Deleted Successfully", 200);
    }
}
