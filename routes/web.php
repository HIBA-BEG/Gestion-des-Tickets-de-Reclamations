<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ReclamationController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\GuestTicketController;
use Illuminate\Support\Facades\Mail;



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

// Route::get('/', [ArticleBlogController::class, 'welcome'])->name('home');


Route::get('login', [LoginController::class, 'create'])->name('login');
Route::post('login', [LoginController::class, 'store'])->name('login');
Route::get('register', [RegisterController::class, 'create'])->name('register');
Route::post('register', [RegisterController::class, 'store'])->name('register');
Route::post('logout', [LoginController::class, 'destroy'])->name('logout');
// Route::get('forgotMyPassword', [PasswordOublieController::class, 'create'])->name('forgotPassword');
// Route::post('forgotMyPassword', [PasswordOublieController::class, 'forgotPassword'])->name('forgotPassword');
// Route::get('resetMyPassword/{token}', [PasswordOublieController::class, 'resetPassword'])->name('resetPassword');
// Route::post('resetMyPassword/{token}', [PasswordOublieController::class, 'resetPasswordPost'])->name('resetPassword');

Route::get('addForm', [ReclamationController::class, 'create'])->name('addForm');
Route::get('infoForm', [ReclamationController::class, 'info'])->name('infoForm');
Route::get('ToutsLesTickets', [TicketController::class, 'index'])->name('indexTickets');
Route::get('UnTicket', [TicketController::class, 'showOne'])->name('oneTicket');
Route::patch('/updateTicket/{id}', [TicketController::class, 'edit'])->name('editTicket');
Route::delete('/Tickets/{ticket}', [TicketController::class, 'destroy'])->name('destroyTicket');

// Guest
Route::get('/guest-ticket', [GuestTicketController::class, 'create'])->name('guest_ticket.create');
Route::get('/submit-ticket', [GuestTicketController::class, 'store'])->name('guest_ticket.store');
Route::post('/submit-ticket', [GuestTicketController::class, 'store'])->name('guest_ticket.store');
Route::get('/track-ticket', [GuestTicketController::class, 'trackForm'])->name('guest_ticket.trackForm');
Route::post('/track-ticket', [GuestTicketController::class, 'track'])->name('guest_ticket.track');
Route::get('/ticket/{tracking_code}', [GuestTicketController::class, 'status'])->name('guest_ticket.status');

Route::get('/test-email', function () {
    $ticket = App\Models\Ticket::first(); // Assuming you have at least one ticket in your database
    Mail::to('eytchcreations@gmail.com')->send(new App\Mail\TicketSubmitted($ticket)); // Replace with a real email
    return 'Email sent!';
});
