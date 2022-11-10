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

Route::prefix('admin')->middleware(['admin-handling'])->group(function () {
    Route::get('/bengkel', function () {
        $list = \App\Models\Bengkel::select(['*'])
        ->whereNull('deleted_at')
        ->paginate(10);

        return view('admin/bengkel', compact('list'));
    });

    Route::post('bengkel', function (Request $request) {
        if ($request->hasFile('foto_bengkel')) {
            $file = $request->file('foto_bengkel');
            $nama = str_replace(' ', '_', $request->nama_bengkel).'_'.date('Y-m-d_s').'_.'.$file->extension();
            $file->move(public_path().'/foto', $nama);

            $foto = '/foto/'.$nama;
        } else {
            $foto = $request->foto_bengkel;
        }

        \App\Models\Bengkel::create([
            'nama_bengkel' => $request->nama_bengkel,
            'nama_pemilik' => $request->nama_pemilik,
            'alamat' => $request->alamat,
            'keterangan' => $request->keterangan,
            'nomor_hp' => $request->nomor_hp,
            'longitude' => $request->longitude,
            'latitude' => $request->latitude,
            'foto_bengkel' => $foto,
            'terima_tubles' => $request->terima_tubles,
            'terima_tubles' => $request->terima_tubles,
            'terima_non_tubles' => $request->terima_non_tubles,
            'terima_panggilan' => $request->terima_panggilan,
            'terima_mobil' => $request->terima_mobil,
            'terima_motor' => $request->terima_motor,
            'terima_kendaraan_berat' => $request->terima_kendaraan_berat,
        ]);

        return Redirect::back();
    });

    Route::get('bengkel/{id}', function (Request $request, $id) {
        $bengkel = \App\Models\Bengkel::select(['*'])
            ->where('id', $id)
            ->whereNull('deleted_at')
            ->first();

        return view('admin.bengkel-detail', compact('bengkel'));
    });

    Route::post('bengkel/{id}', function (Request $request, $id) {
        if ($request->hasFile('foto_bengkel')) {
            $file = $request->file('foto_bengkel');
            $nama = str_replace(' ', '_', $request->nama_bengkel).'_'.date('Y-m-d_s').'_.'.$file->extension();
            $file->move(public_path().'/foto', $nama);

            $foto = '/foto/'.$nama;
        } else {
            $foto = null;
        }

        $bengkel = \App\Models\Bengkel::find($id);
        $bengkel->update([
            'nama_bengkel' => $request->nama_bengkel,
            'nama_pemilik' => $request->nama_pemilik,
            'alamat' => $request->alamat,
            'keterangan' => $request->keterangan,
            'nomor_hp' => $request->nomor_hp,
            'longitude' => $request->longitude,
            'latitude' => $request->latitude,
            'foto_bengkel' => $foto ? $foto : $bengkel->foto_bengkel,
            'terima_tubles' => $request->terima_tubles,
            'terima_tubles' => $request->terima_tubles,
            'terima_non_tubles' => $request->terima_non_tubles,
            'terima_panggilan' => $request->terima_panggilan,
            'terima_mobil' => $request->terima_mobil,
            'terima_motor' => $request->terima_motor,
            'terima_kendaraan_berat' => $request->terima_kendaraan_berat,
        ]);

        return Redirect::back();
    });

    Route::get('bengkel/delete/{id}', function (Request $request, $id) {
        \App\Models\Bengkel::find($id)->delete();

        return Redirect::back();
    });

    Route::post('bengkel/status/{id}', function (Request $request, $id) {
        // dd((int) $request->status);
        $status = \App\Models\Bengkel::find($id);
        $status->update([
            'status' => (int) $request->status,
        ]);

        return Redirect::back();
    });
});
