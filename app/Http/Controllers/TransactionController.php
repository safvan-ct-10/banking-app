<?php

namespace App\Http\Controllers;

use App\Http\Requests\DepositRequest;
use App\Http\Requests\TransferRequest;
use App\Http\Requests\WithdrawRequest;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class TransactionController extends Controller
{
    public function index(): View
    {
        $active = 'home';
        return view('home')->with('active', $active);
    }

    // Deposit Function
    public function deposit(): View
    {
        $active = 'deposit';
        return view('deposit')->with('active', $active);
    }
    public function depositPost(DepositRequest $request): RedirectResponse
    {
        $amount = floatval($request->amount);
        $user = User::find(auth()->user()->id);
        $balance = $user->balance + $amount;

        Transaction::create([
            'type' => 1,
            'amount' => $amount,
            'summary' => 'Deposit',
            'balance' => $balance
        ]);

        $user->balance = $balance;
        $user->save();

        return Redirect::route('deposit')->with('success', "{$amount} deposit successfully!");
    }

    // Withdraw Function
    public function withdraw(): View
    {
        $active = 'withdraw';
        return view('withdraw')->with('active', $active);
    }
    public function withdrawPost(WithdrawRequest $request): RedirectResponse
    {
        $amount = floatval($request->amount);
        $user = User::find(auth()->user()->id);

        if($amount > $user->balance) {
            return redirect()->back()->withInput($request->all())->with('error', 'Insufficient balance!');
        }

        $balance = $user->balance - $amount;

        Transaction::create([
            'type' => 2,
            'amount' => $amount,
            'summary' => 'Withdraw',
            'balance' => $balance
        ]);

        $user->balance = $balance;
        $user->save();

        return Redirect::route('withdraw')->with('success', "{$amount} withdraw successfully!");
    }

    // Transfer Function
    public function transfer(): View
    {
        $active = 'transfer';
        return view('transfer')->with('active', $active);
    }
    public function transferPost(TransferRequest $request): RedirectResponse
    {
        $amount = floatval($request->amount);
        $fromUser = User::find(auth()->user()->id);

        $toUser = User::where('email', $request->email)->first();
        if(is_null($toUser) || ($toUser->id == $fromUser->id)) {
            return redirect()->back()->withInput($request->all())->with('error', 'Email id not registered!');
        }

        if($amount > $fromUser->balance) {
            return redirect()->back()->withInput($request->all())->with('error', 'Insufficient balance!');
        }

        // Send log
        $balance = $fromUser->balance - $amount;

        Transaction::create([
            'type' => 2,
            'amount' => $amount,
            'summary' => "Transfer to {$toUser->email}",
            'balance' => $balance
        ]);

        $fromUser->balance = $balance;
        $fromUser->save();

        // Recieve log
        $balance = $toUser->balance + $amount;

        Transaction::create([
            'type' => 1,
            'amount' => $amount,
            'summary' => "Transfer from {$fromUser->email}",
            'balance' => $balance
        ]);

        $toUser->balance = $balance;
        $toUser->save();

        return Redirect::route('transfer')->with('success', "{$amount} transfer successfully!");
    }

    public function statement(): View
    {
        $active = 'statement';
        return view('statement')->with('active', $active);
    }
}
