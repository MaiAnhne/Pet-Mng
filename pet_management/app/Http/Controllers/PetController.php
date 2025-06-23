<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use Illuminate\Http\Request;

class PetController extends Controller
{
    
    public function index()
    {
        $pets = Pet::with('owners')->get();
        return view('pets.index', compact('pets'));
    }

    
    public function create()
    {
        return view('pets.create');
    }

    
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'species' => 'required',
            'age' => 'required|integer|min:0',
            'description' => 'nullable',
        ]);

        Pet::create($data);

        return redirect()->route('pets.index')->with('success', 'Pet created successfully!');
    }

    
    public function show(string $id)
    {
        $pet = Pet::with('owners')->findOrFail($id);
        return view('pets.show', compact('pet'));
    }

    
    public function edit(string $id)
    {
        $pet = Pet::findOrFail($id);
        return view('pets.edit', compact('pet'));
    }

    
    public function update(Request $request, string $id)
    {
        $pet = Pet::findOrFail($id);

        $data = $request->validate([
            'name' => 'required',
            'species' => 'required',
            'age' => 'required|integer|min:0',
            'description' => 'nullable',
        ]);

        $pet->update($data);

        return redirect()->route('pets.index')->with('success', 'Pet updated successfully!');
    }

    
    public function destroy(string $id)
    {
        $pet = Pet::findOrFail($id);
        $pet->delete();

        return redirect()->route('pets.index')->with('success', 'Pet deleted successfully!');
    }
}
