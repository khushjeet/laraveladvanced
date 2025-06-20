<?php

use App\Http\Controllers\EmailController;
use App\Http\Controllers\ProfileController;
use App\Mail\SendMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail; // ✅ Add this line

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Route::get('/send_mail_1', function () {
//     return view('mail.send_mail');
// });

// Route::post('/send_mail_1', function (Request $request) {
//     // Mail::raw($request->message, function ($message) use ($request) {
//     //     $message->to($request->email)
//     //         ->subject("Laravel Mail Test");
//     // });
// })->name('send.email');

// Route::post('/send_mail_1', function (Request $request) {
//     $filePath = null;

//     if ($request->hasFile('file')) {
//         $filePath = $request->file('file')->store('attachments');
//     }

//     Mail::to($request->email)->queue(new SendMail($request->message, ));

//     dd("Email sent successfully");
// })->name('send.email');





Route::get('/send-email', [EmailController::class, 'index'])->name('email.form');
Route::post('/send-email', [EmailController::class, 'sendEmail'])->name('email.send');



require __DIR__ . '/auth.php';
