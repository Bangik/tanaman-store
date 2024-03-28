<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Plant;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::where('user_id', Auth::user()->id)->latest()->get();
        return view('user.transactions.index', compact('transactions'));
    }

    public function show($id)
    {
        $transaction = Transaction::find($id);
        return view('user.transactions.show', compact('transaction'));
    }

    public function indexCart()
    {
        $carts = Cart::where('user_id', Auth::user()->id)->get();
        return view('user.transactions.cart', compact('carts'));
    }

    public function addToCart($id)
    {
        $plant = Plant::find($id);

        $cart = Cart::where('user_id', Auth::user()->id)->where('plant_id', $plant->id)->first();

        if ($cart) {
            $cart->update([
                'quantity' => $cart->quantity + 1,
            ]);

            return redirect()->back();
        }

        Cart::create([
            'user_id' => Auth::user()->id,
            'plant_id' => $plant->id,
            'quantity' => 1,
        ]);

        return redirect()->back();
    }

    public function store()
    {
        $carts = Cart::where('user_id', Auth::user()->id)->get();

        if ($carts->count() == 0) {
            return redirect()->back();
        }

        $total = 0;
        foreach ($carts as $cart) {
            $total += $cart->plant->price * $cart->quantity;
        }

        $transaction = Transaction::create([
            'user_id' => Auth::user()->id,
            'invoice_number' => 'INV/' . time(),
            'total' => $total,
            'status' => 'PENDING',
        ]);

        foreach ($carts as $cart) {
            $transaction->detailTransactions()->create([
                'plant_id' => $cart->plant_id,
                'quantity' => $cart->quantity,
                'sub_total' => $cart->plant->price * $cart->quantity,
            ]);
        }

        Cart::where('user_id', Auth::user()->id)->delete();

        return redirect()->route('transactions.user.index');
    }

    public function update(Request $request, $id)
    {
        $cart = Cart::find($id);
        $cart->update([
            'quantity' => $request->quantity,
        ]);

        return response()->json([
            'message' => 'Cart updated',
        ]);
    }

    public function upload(Request $request, $id)
    {
        $transaction = Transaction::find($id);

        $request->validate([
            'transfer_proof' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $image = $request->file('transfer_proof');
        $image_name = time() . '.' . $image->extension();
        $image->move(public_path('transfer_proof'), $image_name);
        $image_name = 'transfer_proof/' . $image_name;

        $transaction->update([
            'payment_image' => $image_name,
            'status' => 'PROCESSING',
        ]);

        return redirect()->back();
    }

    public function destroy($id)
    {
        Cart::destroy($id);
        return redirect()->back();
    }
}
