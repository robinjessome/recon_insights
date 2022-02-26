<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\ReconSurveysController;
use App\Http\Controllers\ImageUploadController;

// use App\Http\Livewire\Surveys\ShowAllSurveys;
// use App\Http\Livewire\Surveys\Edit;

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


Route::middleware(['auth'])->group(function () {
    
    Route::get('/dashboard', function () {
        return view('recon.dashboard');
    })->name('dashboard');


    // Surveys 
    Route::controller(ReconSurveysController::class)->prefix('surveys')->group(function () {
        Route::get('/', 'index')->name('surveys');
        Route::get('/insights/{surveyId}', 'getInsights')->name('survey-insights');
        Route::get('/edit/{surveyId}', 'showSurvey')->name('edit-survey');
        Route::get('/edit', function () {
            abort(404);
        });

        Route::post('/update/{surveyId}', 'updateSurvey')->name('update-survey');

    });


    Route::get('/s/{surveyId}', [ReconSurveysController::class, 'show'])->name('public-survey');

    Route::get('/admin', function () {
        if(Auth::user()->isAdmin()) {
            return view('recon.admin');
        } else {
            return redirect('/dashboard');
        }
    })->name('admin');

});



// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');


require __DIR__.'/auth.php';
