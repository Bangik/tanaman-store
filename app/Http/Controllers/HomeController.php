<?php

namespace App\Http\Controllers;

use App\Models\Plant;
use App\Models\PlantCare;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $total_users = User::where('role', 'user')->count();
        $total_tanaman = Plant::count();
        $total_transaction_success = Transaction::where('status', 'SUCCESS')->count();
        $total_tanaman_care = PlantCare::where('status', 'pending')->count();
        return view('home', compact('total_users', 'total_tanaman', 'total_transaction_success', 'total_tanaman_care'));
    }
}
