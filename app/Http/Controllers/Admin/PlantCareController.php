<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PlantCare;
use Illuminate\Http\Request;

class PlantCareController extends Controller
{
    public function index()
    {
        $plantCares = PlantCare::all();
        return view('admin.plantcare.index', compact('plantCares'));
    }

    public function show($id)
    {
        $plantCare = PlantCare::findOrFail($id);
        return view('admin.plantcare.show', compact('plantCare'));
    }

    public function destroy($id)
    {
        $plantCare = PlantCare::findOrFail($id);
        $plantCare->delete();
        return redirect()->route('plantCares.index');
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'status' => 'required|in:approved,rejected'
        ]);

        $plantCare = PlantCare::findOrFail($id);
        $plantCare->update(['status' => $request->status]);
        return redirect()->route('plantCares.index');
    }
}
