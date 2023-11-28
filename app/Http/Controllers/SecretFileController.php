<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SecretFile;

class SecretFileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $files = SecretFile::all();
        return view('secret_files.index', compact('files'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('secret_files.create');
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
            'secret_id' => 'required|exists:secrets,id',
            'title' => 'required|string|max:255',
            'path' => 'required|string|max:255',
        ]);

        SecretFile::create($validatedData);

        return redirect()->route('secret-files.index')->with('success', 'Successfully created');
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
    public function edit(SecretFile $file)
    {
        return view('secret_files.edit', compact('file'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SecretFile $file) //id
    {
        $validatedData = $request->validate([
            'secret_id' => 'required|exists:secrets,id',
            'title' => 'required|string|max:255',
            'path' => 'required|string|max:255',
        ]);

        $file->update($validatedData);

        return redirect()->route('secret-files.index')->with('success', 'Changed files successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(SecretFile $file) //id
    {
        $file->delete();
        return redirect()->route('secret-files.index')->with('success', 'Файл успешно удален.');
    }
}
