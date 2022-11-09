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

include base_path('routes/admin/admin.php');
include base_path('routes/admin/bengkel.php');
include base_path('routes/admin/user.php');
