<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Auth (UI only — POST redirects, no validation or persistence)
Route::get('/register/vendor', fn () => view('auth.register-vendor'))->name('register.vendor');
Route::post('/register/vendor', fn () => redirect()->route('dashboard'));
Route::get('/register/staff', fn () => view('auth.register-staff'))->name('register.staff');
Route::post('/register/staff', fn () => redirect()->route('dashboard'));
Route::get('/login', fn () => view('auth.login'))->name('login');
Route::post('/login', fn () => redirect()->route('dashboard'));

// App (dashboard — placeholder, no auth guard)
Route::get('/dashboard', fn () => view('dashboard.index'))->name('dashboard');

// Footer / static pages (placeholder content for now)
Route::get('/about', fn () => view('static.placeholder', ['pageTitle' => 'About']))->name('about');
Route::get('/privacy', fn () => view('static.placeholder', ['pageTitle' => 'Privacy Policy']))->name('privacy');
Route::get('/terms', fn () => view('static.placeholder', ['pageTitle' => 'Terms & Conditions']))->name('terms');
Route::get('/contact', fn () => view('static.placeholder', ['pageTitle' => 'Contact']))->name('contact');
