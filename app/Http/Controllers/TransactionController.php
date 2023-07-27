<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class TransactionController extends Controller
{
    public function index(): View
    {
        $active = 'home';
        return view('home')->with('active', $active);
    }

    public function deposit(): View
    {
        $active = 'deposit';
        return view('deposit')->with('active', $active);
    }

    public function withdraw(): View
    {
        $active = 'withdraw';
        return view('withdraw')->with('active', $active);
    }

    public function transfer(): View
    {
        $active = 'transfer';
        return view('transfer')->with('active', $active);
    }

    public function statement(): View
    {
        $active = 'statement';
        return view('statement')->with('active', $active);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }
}
