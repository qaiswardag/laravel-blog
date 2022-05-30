<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Validation\Rule;
use function auth;
use function request;
use function session;


class RegisterController extends Controller
{
    public function create()
    {
        return view('register.create');
    }


    public function store()
    {
        // create the user
        $validated = request()->validate([
            'name' => ['required', 'min:1', 'max:255'],
            'username' => ['required', 'min:1', 'max:255'],
            'email' => ['required', 'max:255', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'min:1', 'max:255']
        ]);

        // hash password
        // ref. check User Model
        // method: setPasswordAttribute

        // if validation fails Laravel will redirect back to previous page

        // check what is in the request
        // var_dump(request()->all());

        // if validation is success
        // create user in database
        $user = User::create($validated);


        // log user in
        auth()->login($user);

        // message apears only until next page request
        // session()->flash('success', 'Your account have been created');
        // redirect with a pice of data
        return redirect('/')->with('success', 'Your account have been created');

    }
}
