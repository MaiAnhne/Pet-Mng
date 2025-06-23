<?php

namespace App\Http\Controllers;

use App\Models\Owner;
use App\Models\Pet;
use Illuminate\Http\Request;

class OwnerController extends Controller
{

    public function index()
    {
        $owners = Owner::all();
        return view('owners.index', compact('owners'));
    }

    
    public function create()
    {
        return view('owners.create');
    }

    
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:owners',
            'phone' => 'nullable',
        ]);

        Owner::create($data);
        return redirect()->route('owners.index')->with('success', 'Owner created successfully!');
    }

    
    public function show(string $id)
    {
        $owner = Owner::with('pets')->findOrFail($id);
        return view('owners.show', compact('owner'));
    }

    
    public function edit(string $id)
    {
        $owner = Owner::findOrFail($id);
        return view('owners.edit', compact('owner'));
    }

    
    public function update(Request $request, string $id)
    {
        $owner = Owner::findOrFail($id);

        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:owners,email,' . $owner->id,
            'phone' => 'nullable',
        ]);

        $owner->update($data);
        return redirect()->route('owners.index')->with('success', 'Owner updated successfully!');
    }

    
    public function destroy(string $id)
    {
        $owner = Owner::findOrFail($id);
        $owner->delete();
        return redirect()->route('owners.index')->with('success', 'Owner deleted successfully!');
    }

    
    public function assignPet(Request $request, Owner $owner, Pet $pet)
    {
        $owner->pets()->syncWithoutDetaching([$pet->id]);
        return back()->with('success', 'Pet assigned to Owner!');
    }
}
