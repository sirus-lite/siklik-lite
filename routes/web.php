<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Livewire\Master\MasterPasien\MasterPasien;

use App\Http\Livewire\Master\MasterPoli\MasterPoli;
use App\Http\Livewire\Master\MasterDokter\MasterDokter;
use App\Http\Livewire\Master\MasterRefBpjs\MasterRefBpjs;


use App\Http\Livewire\RJ\BookingRJ\BookingRJ;
use App\Http\Livewire\RJ\DaftarRJ\DaftarRJ;
use App\Http\Livewire\RJ\EmrRJ\EmrRJ;
use App\Http\Livewire\RJ\EmrRJ\TelaahResepRJ\TelaahResepRJ;
use App\Http\Livewire\RJ\PelayananRJ\PelayananRJ;


// use App\Http\Livewire\RJ\DisplayPelayananRJ\DisplayPelayananRJ;








/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

use App\Http\Livewire\MyAdmin\Users\Users;
use App\Http\Livewire\MyAdmin\Roles\Roles;
use App\Http\Livewire\MyAdmin\Permissions\Permissions;

// Role Group
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/MyUsers', Users::class)->name('MyUsers');
    Route::get('/MyRoles', Roles::class)->name('MyRoles');
    Route::get('/MyPermissions', Permissions::class)->name('MyPermissions');
});

Route::group(['middleware' => ['role:Admin|Mr|Perawat|Dokter|Apoteker']], function () {

    // Master Pasien
    Route::get('MasterPasien', MasterPasien::class)->middleware('auth')->name('MasterPasien');

    // Master Poli
    Route::get('MasterPoli', MasterPoli::class)->middleware('auth')->name('MasterPoli');

    // Master Dokter
    Route::get('MasterDokter', MasterDokter::class)->middleware('auth')->name('MasterDokter');

    // Master Dokter
    Route::get('MasterRefBpjs', MasterRefBpjs::class)->middleware('auth')->name('MasterRefBpjs');



    // RJ
    Route::get('BookingRJ', BookingRJ::class)->middleware('auth')->name('BookingRJ');
    Route::get('daftarRJ', DaftarRJ::class)->middleware('auth')->name('daftarRJ');
    Route::get('EmrRJ', EmrRJ::class)->middleware('auth')->name('EmrRJ');
    Route::get('TelaahResepRJ', TelaahResepRJ::class)->middleware('auth')->name('TelaahResepRJ');
    Route::get('pelayananRJ', PelayananRJ::class)->middleware('auth')->name('pelayananRJ');




    // Route::get('displayPelayananRJ', displayPelayananRJ::class)->middleware('auth')->name('displayPelayananRJ');



});











require __DIR__ . '/auth.php';
