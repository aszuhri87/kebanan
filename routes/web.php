<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/form-pendaftaran', function () {
    return view('form-pendaftaran');
});

Route::post('/', function (Request $request) {
    $search = \App\Models\Bengkel::select([
            'id',
            'latitude as lat',
            'longitude as lng',
            'nama_bengkel as namaBengkel',
            'alamat as alamatBengkel',
            'terima_tubles as tubles',
            'foto_bengkel',
            'terima_motor',
            'terima_mobil',
            'terima_non_tubles as nonTubles',
            'terima_panggilan as repairOnDelivery',
            'terima_kendaraan_berat',
            'nomor_hp',
        ])
        ->where('status', 1)
        ->whereNull('deleted_at');

    if ($request->tipeKendaraan != null) {
        if ($request->tipeKendaraan == 'mobil') {
            $search->where('terima_mobil', 1);
        }

        if ($request->tipeKendaraan == 'motor') {
            $search->where('terima_motor', 1);
        }
    }

    if ($request->tipeBan != null) {
        if ($request->tipeBan == 'tubles') {
            $search->where('terima_tubles', 1);
        }

        if ($request->tipeBan == 'biasa') {
            $search->where('terima_non_tubles', 1);
        }
    }

    if ($request->jenisService != null) {
        if ($request->jenisService == 'antar') {
            $search->where('terima_panggilan', 1);
        }

        if ($request->jenisService == 'biasa') {
            $search->where('terima_panggilan', 0);
            $search->orWhere('terima_panggilan', 1);
        }
    }

    $results = $search->get();
    $result = [];

    foreach ($results as $cari) {
        $latFrom = deg2rad((float) $cari->lat);
        $lngFrom = deg2rad((float) $cari->lng);
        $latTo = deg2rad((float) $request->lat);
        $lngTo = deg2rad((float) $request->lng);

        $latDelta = $latTo - $latFrom;
        $lngDelta = $lngTo - $lngFrom;

        $angle = 2 * asin(sqrt(pow(sin($latDelta / 2), 2) + cos($latTo) * cos($latFrom) * pow(sin($lngDelta / 2), 2)));
        $radius = 6371000 * $angle;
        $cari->radius = $radius;

        if ($cari->radius <= 2000) {
            $result[] = $cari;
        }
    }

    return response()->json([
            'status' => 'success',
            'data' => $result,
            'message' => 'Information load successfully!',
    ], 200);
});

Route::post('daftar-bengkel', function (Request $request) {
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

    return Redirect::back()->with('message', 'Berhasil Mendaftar!');
});

include base_path('routes/admin/admin.php');
include base_path('routes/admin/bengkel.php');
include base_path('routes/admin/user.php');
