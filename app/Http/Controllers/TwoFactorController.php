<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TwoFactorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('auth.verify-otp');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = auth()->user();
        if ($request->code == $user->code) {
            $user->resetCode();
            return redirect()->route('dashboard');
        }

        return redirect()->back()->withErrors(['code' => 'Verification Code Incorect']);
    }
}
