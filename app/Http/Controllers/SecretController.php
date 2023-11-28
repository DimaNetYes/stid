<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Secret;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;

class SecretController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //$secrets = Secret::all();
        //return view('secrets.index', compact('secrets'));

        $secrets = Secret::where('user_id', Auth::id())->get();

        return Inertia::render('Secrets/Index', compact('secrets'));


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //return view('secrets.create');

        return Inertia::render('Secrets/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*$validatedData = $request->validate([
            'user_id' => 'required|exists:users,id',
            'password' => 'nullable|string|max:255',
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'views' => 'integer',
            'valid_until' => 'date',
            'delete_when_expired' => 'boolean',
            'hash' => 'nullable|string|max:255',
            'instructions' => 'nullable|string',
        ]);

        Secret::create($validatedData);

        return redirect()->route('secrets.index')->with('success', 'Secret successfully created');*/

        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'password' => 'nullable|string|max:255',
            'views' => 'integer',
            'valid_until' => 'date|nullable',
            'delete_when_expired' => 'boolean',
            'hash' => 'nullable|string|max:255',
            'instructions' => 'nullable|string',
        ]);

        $validatedData['user_id'] = Auth::id();

        Secret::create($validatedData);

        return redirect()->route('secrets.index')->with('success', 'Секрет успешно создан.');

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
    public function edit(Secret $secret) //id
    {
        return view('secrets.edit', compact('secret'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Secret $secret) //id
    {
        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,id',
            'password' => 'nullable|string|max:255',
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'views' => 'integer',
            'valid_until' => 'date',
            'delete_when_expired' => 'boolean',
            'hash' => 'nullable|string|max:255',
            'instructions' => 'nullable|string',
        ]);

        $secret->update($validatedData);

        return redirect()->route('secrets.index')->with('success', 'Changes successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Secret $secret) //id
    {
        $secret->delete();
        return redirect()->route('secrets.index')->with('success', 'Секрет успешно удален.');
    }
}
