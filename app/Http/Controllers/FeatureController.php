<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feature;
use Illuminate\Support\Facades\Storage;

class FeatureController extends Controller
{
    public function index()
    {
        $features = Feature::all();
        return view('layouts.features', compact('features'));
    }


    public function create()
    {
        return view('layouts.features-create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $feature = new Feature();
        $feature->title = $request->title;
        $feature->description = $request->description;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('features', 'public');
            $feature->image = $imagePath;
        }

        $feature->save();

        return redirect()->route('features.index')
            ->with('success', 'Feature created successfully.');
    }

    public function edit(Feature $feature)
    {
        return view('layouts.features-edit', compact('feature'));
    }

    public function update(Request $request, Feature $feature)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $feature->title = $request->title;
        $feature->description = $request->description;

        if ($request->hasFile('image')) {
            // Delete old image if it exists
            if ($feature->image) {
                Storage::disk('public')->delete($feature->image);
            }

            $imagePath = $request->file('image')->store('features', 'public');
            $feature->image = $imagePath;
        }

        $feature->save();

        return redirect()->route('features.index')
            ->with('success', 'Feature updated successfully.');
    }

    public function destroy(Feature $feature)
    {
        // Delete the image file if it exists
        if ($feature->image) {
            Storage::disk('public')->delete($feature->image);
        }

        $feature->delete();

        return redirect()->route('features.index')
            ->with('success', 'Feature deleted successfully.');
    }
}
