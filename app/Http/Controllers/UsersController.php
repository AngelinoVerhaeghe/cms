<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function makeAdmin(User $user)
    {
        $user->role = 'Administrator';

        $user->save();

        session()->flash('success', 'User made Administrator successfully.');

        return redirect(route('users.index'));
    }
}
