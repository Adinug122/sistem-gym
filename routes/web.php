<?php

use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\MembershipController;
use App\Http\Controllers\PaketController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProgramLatihanController;
use App\Http\Controllers\TrainerController;
use App\Models\Paket;
use App\Models\ProgramLatihan;
use GuzzleHttp\Promise\Create;
use Illuminate\Support\Facades\Route;

Route::get('/',[DashboardController::class,'index'])->name('landing');

Route::middleware(['role:member'])->group(function(){
Route::get('/hai', function () {
    return view('hai');
})->name('hai');
Route::get('/dashboard',[DashboardController::class,'dashboard'])->name('dashboard.user');
Route::get('/membership/success',[MembershipController::class,'success'])->name("success");
Route::resource('membership',MembershipController::class);
});

Route::get('/hai',[DashboardController::class,'dashboard'])->name('hai');

Route::middleware(['role:trainer'])->group(function(){
Route::get('/trainer',function(){
    return view('trainer');
})->name('trainer');
Route::resource('program',ProgramLatihanController::class);
Route::resource('jadwal',JadwalController::class);
});


Route::middleware(['role:admin'])->prefix('admin')->name('admin.')->group(function(){
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/member', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/scan',function(){
    return view('scan.index');
})->name('scan');
Route::post('/absensi',[AbsensiController::class,'store'])->name('absensi.store');
Route::get('/absensi/checkin',[AbsensiController::class,'index'])->name('absensi.index');
Route::get('/membership',[MembershipController::class,'index'])->name('membership.index');
Route::get('/membership/create',[MembershipController::class,'create'])->name('membership.create');
Route::post('/membership/simpan',[MembershipController::class,'simpan'])->name('membership.simpan');
Route::get('/trainer',[TrainerController::class,'index'])->name('trainer.index');
Route::get('/trainer/create',[TrainerController::class,'create'])->name("trainer.create");
Route::post('/trainer',[TrainerController::class,'store'])->name("trainer.store");
Route::get('/trainer/{id}/edit',[TrainerController::class,'edit'])->name("trainer.edit");
Route::put('/trainer{id}',[TrainerController::class,'update'])->name('trainer.update');
Route::delete('/trainer/{id}',[TrainerController::class,'destroy'])->name('trainer.destroy');
Route::resource('paket',PaketController::class);
Route::resource('member',MemberController::class);
Route::get('/member/{id}/card',[MemberController::class,'cetakKartu'])->name('cetak');
Route::get('/payment',[PaymentController::class,'index'])->name('payment.index');
Route::get('/dashboard',[AdminController::class,'index'])->name('dashboard');
Route::get('/payment/export', [PaymentController::class, 'exportExcel'])->name('payment.export');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
