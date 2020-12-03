<?php

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
use App\User;
use App\Mahasiswa;
use App\Dosen;
use App\Topik;
use App\TugasAkhir;
use App\Pembimbing;
use App\Berkas;
use App\Acuan;

Route::get('/', 'GuestController@index')->name('guestIndex');
Route::get('/download', 'GuestController@download')->name('guestDownload');
Route::get('/download/{download}', 'GuestController@downloadFile')->name('downloadFile');
Route::get('/topikta', 'GuestController@topik')->name('guestTopik');
Route::get('/pencarian', 'GuestController@pencarian')->name('guestPencarian');
Route::get('/sidang', 'GuestController@sidang')->name('guestSidang');
Route::get('/seminar', 'GuestController@seminar')->name('guestSeminar');

Auth::routes();
Route::group(['middleware'=> 'auth'],function(){
    Route::get('/home', 'HomeController@index')->name('home');

    Route::get('/manual', 'PetunjukController@manual')->name('manual');
    Route::get('/profil', 'ChangePasswordController@index')->name('profil');
    Route::post('change-password', 'ChangePasswordController@store')->name('change.password');

    Route::resource('mahasiswa','MahasiswaController');
    Route::get('/exportExcel/mahasiswa', 'MahasiswaController@exportExcel')->name('mahasiswa.exportExcel');
    Route::post('/import/mahasiswa', 'MahasiswaController@importExcel')->name('mahasiswa.importExcel');
    
    Route::resource('dosen','DosenController');
    Route::get('/exportExcel/dosen', 'DosenController@exportExcel')->name('dosen.exportExcel');
    Route::post('/import/dosen', 'DosenController@importExcel')->name('dosen.importExcel');
    
    Route::resource('user','UserController');
    Route::put('user/{user}','UserController@resetPassword')->name('resetPassword');
    Route::put('updateEmail','UserController@updateEmail')->name('updateEmail');
    
    Route::resource('agenda', 'AgendaController');
    Route::resource('acuan', 'AcuanController');
    
    Route::resource('tugasakhir', 'TugasAkhirController');
    Route::get('/exportExcel/tugasakhir', 'TugasAkhirController@exportExcel')->name('tugasakhir.exportExcel');
    Route::get('/mahasiswaTA', 'TugasAkhirController@mahasiswaTA')->name('mahasiswaTA');
    Route::get('/tambah/tugasakhir', 'TugasAkhirController@tambah')->name('tambahTA');
    Route::post('/tambah/tugasakhir', 'TugasAkhirController@upload')->name('uploadTA');
    
    Route::get('/berkas', 'BerkasController@index')->name('berkas.index');
    Route::get('/uploadBerkas', 'BerkasController@create')->name('berkas.create');
    Route::post('/uploadBerkas', 'BerkasController@store')->name('berkas.store');
    Route::get('/berkas/{berkas}', 'BerkasController@show')->name('berkas.show');
    Route::put('/berkas/{berkas}', 'BerkasController@update')->name('berkas.update');
    Route::patch('/berkas/{berkas}', 'BerkasController@salah')->name('berkas.salah');
    
    Route::resource('topik', 'TopikController');
    Route::get('/tambah/topik', 'TopikController@tambahTopik')->name('tambahTopik');
    Route::get('/exportExcel/topik', 'TopikController@exportExcel')->name('topik.exportExcel');
    
});