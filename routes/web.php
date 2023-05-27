<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\UserController;
use App\Models\Event;
use App\Models\User;
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
Route::get('/',function(){
    $events=Event::all();
    return view('homepage',[
        'events'=>$events
    ]);
});
Route::get('/details/{id}',[EventController::class,'showSingleEvent']);
//create a new event
Route::get('/createevent',[EventController::class,'showEventFormPage'])->middleware('auth');
Route::post('/saveevent',[EventController::class,'saveEvent'])->middleware('auth');
Route::get('/editpage/{event}',[EventController::class,'showEditEventPage'])->middleware('auth');
Route::post('/updateevent/{event}',[EventController::class,'updateEvent'])->middleware('auth');
Route::delete('/delete/{event}',[EventController::class,'deleteEvent'])->middleware('auth');

Route::get('/registration',[UserController::class,'registerForm'])->middleware('guest');
Route::post('/registered',[UserController::class,'saveRegistration']);

Route::post('/logout',[UserController::class,'logout']);
Route::get('/login',[UserController::class,'showLoginPage'])->name('login')->middleware('guest');
Route::post('/logged',[UserController::class,'userLogin'])->middleware('guest');

Route::get('/manage',[EventController::class,'showManagePage'])->middleware('auth');
Route::get('/registerEvent/{eventId}',[RegistrationController::class,'registerEvent'])->middleware('auth');
Route::get('registeredAttendees/{eventId}',[RegistrationController::class,'showRegisteredAttendees'])->middleware('auth');

