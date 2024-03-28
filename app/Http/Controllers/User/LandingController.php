<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Plant;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index()
    {
        $plants = Plant::latest()->take(8)->get();
        return view('user.index', compact('plants'));
    }
}
