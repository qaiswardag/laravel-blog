<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Nette\Schema\ValidationException;
use function session;

class SessionsController extends Controller
{

    public function create()
    {
        return view('sessions.login');
    }

    public function store()
    {
        // to do:
        // validate the request
        $validated = request()->validate([
            // find an email address that exists on the users table and specifically in the email column
            'email' => ['required', 'exists:users,email'],
            'password' => ['required']
        ]);

        // attempt to authenticate and log in the user
        // based on the provided credentials
        // attempt method both sign user in but also checks if credentials are correct
        if (auth()->attempt($validated)) {
            session()->regenerate();
            return redirect('/')->with('success', 'Welcome back');
        }

        // if authenticaion fails
        // option 1.
        //        return back()
        //            // the input data is what the user typed
        //            ->withInput()
        //            ->withErrors(
        //                [
        //                    'message' => 'Your credentials could not be verified.',
        //                ]
        //            );


        // if authenticaion fails
        // option 2.
        throw ValidationException::widthMessages([
            'message' => 'Your credentials could not be verified.',
        ]);


    }

    // redirect with a success flash message

    public function destroy()
    {
        auth()->logout();

        return redirect('/')->with('success', 'Goodbye');
    }
}
