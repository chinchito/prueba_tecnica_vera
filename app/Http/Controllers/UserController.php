<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::filterUsers()->get();
        return view("users.index")->with([
            "users" => $users
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("users.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        $validated_data = $request->validated();
        
        $new_user = new User;
        $new_user->name = $validated_data["name"];
        $new_user->email = $validated_data["email"];
        $new_user->password = $validated_data["password"];
        $new_user->save();

        return view("users.index")->with([
            "success" => "Usuario creado con éxito",
            "users" => User::filterUsers()->get()
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view("users.show")->with([
            "is_edition" => false,
            "user" => $user,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view("users.edit")->with([
            "is_edition" => true,
            "user" => $user,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, User $user)
    {
        $validated_data = $request->validated();
        
        $user->name = $validated_data["name"];
        $user->email = $validated_data["email"];
        $user->password = !empty($validated_data["password"]) ? $validated_data["password"] : $user->password;
        $user->save();

        return back()->with([
            "success" => "Usuario actualizado con éxito",
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();

        return back()->with("success", "Ususario eliminado con éxito");
    }
}
