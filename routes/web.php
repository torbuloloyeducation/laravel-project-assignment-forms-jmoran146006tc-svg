<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome', [
    'greeting' => 'Hello, World!',
    'name' => 'John Doe',
    'age' => 30,
    'tasks' => [
        'Learn Laravel',
        'Build a project',
        'Deploy to production',
    ],
]);


Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/services', function () {
    return view('services');
});

Route::get('/showcases', function () {
    return view('showcases');
});

Route::get('/blog', function () {
    return view('blog');
});

Route::get('/formtest', function () {
    $emails = session()->get('emails', []);

    return view('formtest', [
        'emails' => $emails,
    ]);
});

Route::post('/formtest', function () {
    $validated = request()->validate([
        'email' => 'required|email',
    ]);
    $emails = session()->get('emails', []);

    if (in_array($validated['email'], session()->get('emails', []))) {
        return redirect('/formtest')->withErrors(['email' => 'This email has already been submitted.']);
    }

    if (count($emails) >= 5) {
        return redirect('/formtest')->with('warning', 'Maximum of 5 emails reached.');
    }

    session()->push('emails', $validated['email']);
    session()->flash('success', 'Email added successfully!');
    return redirect('/formtest');
});

Route::delete('/formtest', function () {
    $email = request('email');

    $emails = session()->get('emails', []);

    $emails = array_values(array_filter($emails, fn($e) => $e !== $email));

    session()->put('emails', $emails);
    session()->flash('success', 'Email deleted.');
    return redirect('/formtest');
});

Route::get('/delete-emails', function () {
    session()->forget('emails');

    return redirect('/formtest');
});
