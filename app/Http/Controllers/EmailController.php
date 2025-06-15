<?php
namespace App\Http\Controllers;

use App\Models\User;
use App\Mail\NotifyUserMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller implements ShouldQueue
{
    public function index()
    {
        $users = User::all();
        return view('emails.form', compact('users'));
    }

public function sendEmail(Request $request)
{


    $request->validate([
        'subject' => 'required|string',
        'body' => 'required|string',
        'user_ids' => 'required|array',
        'attachment' => 'nullable|file|mimes:jpg,jpeg,png,pdf,docx,txt|max:2048',
    ]);

    $filePath = null;
   if ($request->hasFile('attachment')) {
    $file = $request->file('attachment');
    $filePath = $file->store('attachments', 'public'); // returns path like: attachments/filename.pdf
}


    $users = User::whereIn('id', $request->user_ids)->get();

    foreach ($users as $user) {

Mail::to($user->email)->queue(new NotifyUserMail([
    'subject' => $request->subject,
    'body' => $request->body,
    'attachments' => $filePath, // this will be used in Mailable
]));

    }

    return back()->with('success', 'Emails sent successfully!');
}
}
