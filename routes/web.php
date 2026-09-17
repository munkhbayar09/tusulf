<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/debug-check', function () {
    return response()->json([
        'app_debug' => config('app.debug'),
        'app_env' => config('app.env'),
        'app_url' => config('app.url'),
        'db_connection' => config('database.default'),
        'user_count' => \App\Models\User::count(),
        'is_authenticated' => auth()->check(),
    ]);
});