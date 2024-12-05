<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LoanDetailsController;

// Defgault Login page
Route::get('/', function () {
    return view('auth.login');
});

// Route::middleware(['auth'])->group(function () {
// //     Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');
// });


Route::get('/admin', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    // Loan Details
    Route::get('/loan-details', [LoanDetailsController::class, 'index'])->name('loan.details');
    //Process data form - initial show
    Route::get('/process-data', [LoanDetailsController::class, 'create'])->name('emiprocess.data.show');
    // Process EMI data based on loan details create emi_details table
    Route::post('/process-data', [LoanDetailsController::class, 'store'])->name('emiprocess.data');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/loan-details', [LoanDetailsController::class, 'index'])->name('loan.details');

});

require __DIR__.'/auth.php';
