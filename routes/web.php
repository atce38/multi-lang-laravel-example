<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['lang'])->group(function () {


    Route::get('/', function () {
        return view('welcome');
    });

    Auth::routes();

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


    Route::get('lang/{locale}', function ($locale) {
        // Store the locale in session
        session(['locale' => $locale]);

        // Set the application locale
        app()->setLocale($locale);

        // Redirect back to the previous page
        return redirect()->back();
    });

});


