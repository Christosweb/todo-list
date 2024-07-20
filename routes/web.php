<?php
 
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\registrationController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\Usercontroller;
use Illuminate\Support\Facades\Auth;

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


Route::get('/dashboard', function(){
    return view('dashboard');
})->name('dashboard')->middleware('auth');

Route::get('/logout', function(){
    Auth::logout();
    return to_route('login.index');
})->name('logOut');

Route::get('/registration', [registrationController::class, 'create'])->name('registration.create');
Route::post('/registration', [registrationController::class, 'store'])->name('registration.store');
Route::get('/login', [loginController::class, 'index'])->name('login.index');
Route::post('/login', [loginController::class, 'show'])->name('login.show');
Route::post('/todo', [Usercontroller::class, 'store']);
Route::post('/checkbox', [Usercontroller::class, 'isChecked']);
Route::post('/uncheckbox', [Usercontroller::class, 'unCheck']);
Route::get('/all', [Usercontroller::class, 'find'])->name('all_tasks.find')->middleware('auth');
Route::get('/complete', [Usercontroller::class, 'completed'])->name('completed_tasks.complete')->middleware('auth');
Route::get('/active', [Usercontroller::class, 'active'])->name('active_tasks.active')->middleware('auth');
Route::get('/edit/{id}', [Usercontroller::class, 'getEdit'])->name('edit_tasks.getEdit')->middleware('auth');
Route::patch('/edit{id}', [Usercontroller::class, 'update'])->name('update.update')->middleware('auth');
Route::post('/task/{id}',[Usercontroller::class, 'destroyWarning'] )->name('deleteWarning');
Route::delete('/task/{id}',[Usercontroller::class, 'destroy'] )->name('delete');
Route::get('/user/profile',[Usercontroller::class, 'getUser'] )->name('user_profile.getUser');
Route::post('/user/profile/{id}',[Usercontroller::class, 'updateUserProfile'] )->name('user_profile_edit');
Route::post('/user/password/reset/{id}',[Usercontroller::class, 'resetPassword'] )->name('reset_password');
/**
 * route to show password reset link request form. 
 * 
 */

Route::get('/forgot-password',[Usercontroller::class, 'showEmailForForgotPassword'] )->name('password.request');
/**
 *route handle forgot-password form submission.
 */
Route::post('/forgot-password', [Usercontroller::class, 'forgotPasswordEmailSubmissionHandler'])->name('password.email');

/**
 * password reset form
 * this is the link that will be sent to the user 
 */
Route::get('/forgot-password/{token}', [Usercontroller::class, 'showForgotPasswordForm'])->name('password.reset');

/**
 * routehandling the form link sent to the user
 *
 */

 Route::post('/reset-password', [Usercontroller::class, 'forgotPassword'])->name('password.update');
