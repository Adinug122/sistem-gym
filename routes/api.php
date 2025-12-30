<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaymentsCallbackController;

Route::post('/midtrans/callback',[PaymentsCallbackController::class,'handle']);

Route::get('/api', function () {
    return response()->json([
        'status' => 'API OK',
        'time' => now()
    ]);
});
