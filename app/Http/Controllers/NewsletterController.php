<?php

namespace App\Http\Controllers;

use App\Events\UserSubscribed;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{
    public function subscribe(Request $request)
    {
        //? Validate
        $request->validate([
            'email' => 'required|unique:newsletters,email',
        ]);

        //? Fire event method, object of UserSubscribed with the email passed in
        event(new UserSubscribed($request->input('email')));

        session()->flash('success', 'Thanks for your interest. Submitted successfully.');

        return redirect(route('index'));
    }
}
