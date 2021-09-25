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
    $formdata = [
        'nama' => ['text', 'Masukkan nama'],
        'alamat' => ['text', 'Alamat'],
        'username' => ['email', 'Username'],
        'password' => ['password', 'Password'],
        'blood' => ['select', 'Golongan darah', ['A', 'B', 'AB', 'O']],
        'hobby' => ['checkbox', 'Pilih hobby', ['Jalan-jalan', 'Memancing', 'Berenang']],
        'gender' => ['radio', 'Jenis kelamin', ['Pria', 'Wanita']],
        'profile' => ['textarea', 'Profil anda'],
        'btnsimpan' => ['submit', 'Simpan ']
    ];
    return view('form', compact('formdata'));
});

Route::post('/hasil-form', function (Request $request) {
    return $request->all();
    // return view('hasil-form', compact('data'));
});