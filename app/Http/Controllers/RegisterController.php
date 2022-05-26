<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;
use function bcrypt;
use function redirect;

class RegisterController extends Controller
{
    public function create()
    {
        return view('register.create');
    }

    public function store()
    {
        // create the user
        $attributes = request()->validate([
            'name' => ['required', 'max:255'],
            'username' => ['required', 'max:255', 'min:3'],
            'email' => ['required', 'email', 'max:255'],
            'password' => ['required', 'min:6', 'max:255']
        ]);

        $attributes['password'] = bcrypt($attributes['password']);

        // if validation fails Laravel will redirect back to previous page

        // check what is in the request
        // var_dump(request()->all());

        // if validation is success
        User::create($attributes);

        return redirect('/');

    }
}
