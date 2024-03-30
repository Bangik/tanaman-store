<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Plant;
use Illuminate\Http\Request;

class PlantController extends Controller
{
    public function index()
    {
        $plants = Plant::all();
        return view('user.plant.index', compact('plants'));
    }
}
