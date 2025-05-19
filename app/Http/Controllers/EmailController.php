<?php


// app/Http/Controllers/EmailController.php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Jobs\SendEmailJob;

class EmailController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('emails.form', compact('users'));
    }

    public function send(Request $request)
    {
        $request->validate([
            'user_ids' => 'required|array',
            'subject' => 'required|string',
            'body' => 'required|string',
        ]);

        $details = [
            'subject' => $request->subject,
            'body' => $request->body,
        ];

        $users = User::whereIn('id', $request->user_ids)->get();

        foreach ($users as $user) {
            dispatch(new SendEmailJob($user, $details));
        }

        return back()->with('success', 'Emails are being sent!');
    }
}
