<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PasswordResetToken;

class PasswordResetTokenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tokens = PasswordResetToken::all();
        return view('password_reset_tokens.index', compact('tokens'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('password_reset_tokens.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|email|unique:password_reset_tokens|max:255',
            'token' => 'required|string|max:255',
        ]);

        PasswordResetToken::create($validatedData);

        return redirect()->route('password-reset-tokens.index')->with('success', 'Token created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(PasswordResetToken $token) //id
    {
        return view('password_reset_tokens.edit', compact('token'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PasswordResetToken $token) //id
    {
        $validatedData = $request->validate([
            'email' => 'required|email|unique:password_reset_tokens,email,' . $token->email,
            'token' => 'required|string|max:255',
        ]);

        $token->update($validatedData);

        return redirect()->route('password-reset-tokens.index')->with('success', 'save changes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(PasswordResetToken $token) //id
    {
        $token->delete();
        return redirect()->route('password-reset-tokens.index')->with('success', 'Token deleted');
    }
}
