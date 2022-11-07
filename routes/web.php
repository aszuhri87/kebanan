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
        'nomor_hp'
    ])
    ->whereNull('deleted_at');

    if ($request->tipeKendaraan == 'mobil') {
        $search->where('terima_mobil', 1);
    } else {
        $search->where('terima_motor', 1);
    }

    if ($request->tipeBan == 'tubles') {
        $search->where('terima_tubles', 1);
    } else {
        $search->where('terima_non_tubles', 1);
    }

    if ($request->jenisService == 'antar') {
        $search->where('terima_panggilan', 1);
    } else {
        $search->where('terima_panggilan', 0);
        $search->orWhere('terima_panggilan', null);
    }

    $result = $search->get();

    return response()->json([
        'status' => 'success',
        'data' => $result,
        'message' => 'Information saved successfully!',
    ], 200);
});

include base_path('routes/admin/admin.php');
include base_path('routes/admin/bengkel.php');
include base_path('routes/admin/user.php');
