<?php

use App\Http\Controllers\ContactController;

use Illuminate\Support\Facades\Route;
use App\Mail\ContactMail;
use Illuminate\Support\Facades\Mail;

Route::get('/', function () {
    return view('home');
});

Route::get('/contact', [ContactController::class, 'showForm'])->name('contact.form');

Route::post('/contact', [ContactController::class, 'sendMail'])->name('contact.send');

Route::get('/test-email', function () {
    $details = [
        'name' => 'Test Name',
        'email' => 'test@example.com',
        'phone' => '1234567890',
        'message' => 'This is a test message.',
    ];

    Mail::to('azizlabidine@gmail.com')->send(new ContactMail($details));

    return 'Email sent!';
});
