<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Plant;
use App\Models\PlantCare;
use Illuminate\Http\Request;

class PlantController extends Controller
{
    public function index()
    {
        $plants = Plant::all();
        return view('user.plant.index', compact('plants'));
    }

    public function plantcare()
    {
        return view('user.plant.care');
    }

    public function storePlantCare(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'address' => 'required|string|max:255',
            'plant' => 'required|string|max:255'
        ]);

        PlantCare::create($request->all());
        return redirect()->back()->with('success', 'Data berhasil disimpan');
    }
}
