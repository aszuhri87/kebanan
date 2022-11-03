<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
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

Route::prefix('admin')->middleware(['admin-handling'])->group(function () {
    Route::get('/user', function () {
        $list = \App\Models\Admin::select(['*'])
        ->whereNull('deleted_at')
        ->paginate(10);

        return view('admin/user-list', compact('list'));
    });

    Route::post('user', function (Request $request) {
        \App\Models\Admin::create([
            'nama' => $request->nama_user,
            'email' => $request->nama_pemilik,
            'password' => Hash::make($request->password),
        ]);

        return Redirect::back();
    });

    Route::get('user/{id}', function (Request $request, $id) {
        $user = \App\Models\Admin::select(['*'])
            ->where('id', $id)
            ->whereNull('deleted_at')
            ->first();

        return view('admin.user-detail', compact('user'));
    });

    Route::post('user/update/{id}', function (Request $request, $id) {
        $user = \App\Models\Admin::find($id);
        $user->update([
            'nama' => $request->nama_user,
            'email' => $request->nama_pemilik,
            'password' => Hash::make($request->password) ? Hash::make($request->password) : $user->password,
        ]);

        return Redirect::back();
    });

    Route::get('user/delete/{id}', function (Request $request, $id) {
        \App\Models\Admin::find($id)->delete();

        return Redirect::back();
    });
});
