<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FerwafaController;
use App\Http\Controllers\RefereeController;
use App\Http\Controllers\SeasonFixtures;
use App\Http\Controllers\TeamManagement;

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

/* ======================= Ferwafa user ============================== */
        Route::prefix('ferwafa')->group(function () {
            Route::get('/login', [FerwafaController::class, 'index'])->name('fa_login');
            Route::post('/auth', [FerwafaController::class, 'login'])->name('fa_auth');
            Route::get('home', [FerwafaController::class, 'home'])->name('home')->middleware('ferwafa');
            Route::get('logout', [FerwafaController::class, 'logout'])->name('fa_logout')->middleware('ferwafa');

            /*  ------------------ Team Managemnts Routing -------------------------   */
            Route::get('team', [TeamManagement::class, 'team'])->name('team_reg')->middleware('ferwafa');
            Route::get('team/{team_id}', [TeamManagement::class, 'show'])->name('show')->middleware('ferwafa');
            Route::post('team_add', [TeamManagement::class, 'registration'])->name('team_store')->middleware('ferwafa');
            Route::put('team/{team}', [TeamManagement::class, 'update'])->middleware('ferwafa');
            Route::delete('team/{team}', [TeamManagement::class, 'destroy'])->middleware('ferwafa');
            /*  ------------------ End Team Managemnts Routing-------------------------   */

            /*  ------------------ Refeee Managemnts Routing -------------------------   */
            Route::get('referee', [RefereeController::class, 'index'])->name('referee')->middleware('ferwafa');
            // Route::get('team/{team_id}', [RefereeController::class, 'show'])->name('show')->middleware('ferwafa');
             Route::post('add', [RefereeController::class, 'store'])->name('store')->middleware('ferwafa');
            // Route::put('team/{team}', [RefereeController::class, 'update'])->middleware('ferwafa');
            // Route::delete('team/{team}', [RefereeController::class, 'destroy'])->middleware('ferwafa');
            /*  ------------------ End Referee Managemnts Routing-------------------------   */

             /*  ------------------Season Fixtures Routing -------------------------   */
             Route::get('calender', [SeasonFixtures::class, 'index'])->name('calender')->middleware('ferwafa');
             Route::post('add_calender', [SeasonFixtures::class, 'store'])->name('store-calender')->middleware('ferwafa');

             /*  ------------------End Season Fixtures Routing -------------------------   */
            
        });
        
/* ======================= ENd Ferwafa user ============================== */

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

require __DIR__.'/auth.php';
