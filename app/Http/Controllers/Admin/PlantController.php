<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Plant;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PlantController extends Controller
{
    public function index()
    {
        $plants = Plant::all();
        return view('admin.plants.index', compact('plants'));
    }

    public function create()
    {
        return view('admin.plants.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
            'price' => 'required|numeric',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $image = $request->file('image');
        $image_name = time() . '.' . $image->extension();
        $image->move(public_path('images'), $image_name);
        $image_path = 'images/' . $image_name;

        Plant::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'description' => $request->description,
            'price' => $request->price,
            'image' => $image_path,
        ]);

        return redirect()->route('plants.index')->with('success', 'Data Tanaman berhasil ditambahkan');
    }

    public function show($id)
    {
        return view('admin.plants.show');
    }

    public function edit($id)
    {
        $plant = Plant::find($id);
        return view('admin.plants.edit', compact('plant'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
            'price' => 'required|numeric',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $plant = Plant::find($id);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image_name = time() . '.' . $image->extension();
            $image->move(public_path('images'), $image_name);
            $image_path = 'images/' . $image_name;

            if ($plant->image) {
                unlink(public_path($plant->image));
            }
        } else {
            $image_path = $plant->image;
        }

        $plant->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'description' => $request->description,
            'price' => $request->price,
            'image' => $image_path,
        ]);

        return redirect()->route('plants.index')->with('success', 'Data Tanaman berhasil diupdate');
    }

    public function destroy($id)
    {
        $plant = Plant::find($id);
        
        if ($plant->image) {
            unlink(public_path($plant->image));
        }

        $plant->delete();

        return redirect()->route('plants.index')->with('success', 'Data Tanaman berhasil dihapus');
    }
}
