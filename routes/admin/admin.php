<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register admin routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "admin" middleware group. Now create something great!
|
*/

Route::prefix('admin')->middleware(['guest-admin-handling'])->group(function () {
    Route::get('login', function (Request $request) {
        return view('admin.login');
    });

    Route::post('login', function (Request $request) {
        $login = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (\Auth::guard('admin')->attempt($login)) {
            return redirect('/admin/bengkel');
        } else {
            return Redirect::back()->withErrors(['pesan' => 'Login gagal!, cek email kamu.'])->withInput();
        }
    });
});

Route::prefix('admin')->middleware(['admin-handling'])->group(function () {
    Route::get('/logout', function () {
        if (\Auth::guard('admin')->check()) {
            \Auth::guard('admin')->logout();
            session()->flush();
        }

        return redirect('/admin/login');
    });
});
