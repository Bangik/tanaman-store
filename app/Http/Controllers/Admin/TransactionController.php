<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::latest()->get();
        return view('admin.transaction.index', compact('transactions'));
    }

    public function show(Transaction $transaction)
    {
        return view('admin.transaction.show', compact('transaction'));
    }

    public function edit(Transaction $transaction)
    {
        return view('admin.transaction.edit', compact('transaction'));
    }

    public function update(Request $request, Transaction $transaction)
    {
        $request->validate([
            'status' => 'required|in:PENDING,PROCESSING,SUCCESS,FAILED',
        ]);

        $transaction->update($request->only('status'));

        return redirect()->route('transactions.show', $transaction->id);
    }

    public function destroy(Transaction $transaction)
    {
        if ($transaction->payment_image) {
            unlink(public_path($transaction->payment_image));
        }

        $transaction->delete();

        return redirect()->route('transactions.index');
    }
}
