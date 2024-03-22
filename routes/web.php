<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\RequestController;


// *** GUEST ROUTES ***

Route::middleware(['guest'])->group(function () {
    
    //signup page
    Route::get('/signup', [AuthController::class, 'signupPage']);
    //signup process
    Route::post('/signup', [AuthController::class, 'signupProcess']);

    //signin page
    Route::get('/signin', [AuthController::class, 'signinPage']);
    //signin process
    Route::post('/signin', [AuthController::class, 'signinProcess']);
});



// *** AUTH ROUTES ***

Route::middleware(['auth'])->group(function () {

    //signout process
    Route::get('/signout', [AuthController::class, 'signoutProcess']);

    //upload page
    Route::get('/material/create', [MaterialController::class, 'uploadMaterialPage']);
    // upload process
    Route::post('/material/create', [MaterialController::class, 'uploadMaterialProcess']);

    //request page
    Route::get('/material/request', [RequestController::class, 'requestMaterialPage']);
    // request process
    Route::post('/material/request', [RequestController::class, 'requestMaterialProcess']);

});


// *** PUBLIC ROUTES ***


//test page
Route::get('/test', function () {
    return Inertia::render('Test');
});

//default home page ( Notes Materails)
Route::get('/', [MaterialController::class, 'index']);

// questions page
Route::get('/questions', [MaterialController::class, 'question']);


//labreport page
Route::get('/labreports', [MaterialController::class, 'labreport']);

//labreport page
Route::get('/labreports', [MaterialController::class, 'labreport']);

//request page
Route::get('/request', [RequestController::class, 'index']);

//product page
Route::get('/material/view',[MaterialController::class,'view']);
