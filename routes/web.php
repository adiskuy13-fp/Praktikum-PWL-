<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return redirect()->route('product.index');
});

Route::post('/login', function () { 
// Proses login akan dibuat pada langkah berikutnya. 
})->name('login.authenticate');

Route::post('/login', function (\Illuminate\Http\Request $request) { 
   $credentials = $request->validate([ 
    'email' => ['required', 'email'], 
    'password' => ['required', 'string'], 
]); 
  if (\Illuminate\Support\Facades\Auth::attempt($credentials)) { 
    $request->session()->regenerate(); 
    return redirect()->route('products.index'); 
  } 
  return back()->withErrors([ 
    'email' => 'Email atau password tidak sesuai.', 
  ])->onlyInput('email'); 
})->name('login.authenticate'); 

Route::get('/login', function () { 
    return view('auth.login'); 
})->name('login'); 

Route::post('/logout', function (\Illuminate\Http\Request $request) { 
    \Illuminate\Support\Facades\Auth::logout(); 
 
    $request->session()->invalidate(); 
    $request->session()->regenerateToken(); 
 
    return redirect()->route('login'); 
})->name('logout');

Route::resource('products', ProductController::class);
