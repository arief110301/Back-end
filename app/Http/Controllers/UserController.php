<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(User::latest()->get());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // User::create([
        //     'name'=>$request->name,
        //     'email'=>$request->email,
        //     'password'=>bycrpt($request->password),
        // ]);
        $validateData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required',
            'password' => 'required|min:8|max:255',
            // 'role'      => 'required'

        ]);

        $validateData['password'] = bcrypt($validateData['password']);

        User::create($validateData);
        return response()->json('sukses');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
