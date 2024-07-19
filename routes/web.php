<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ReclamationController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\GuestTicketController;
use App\Http\Controllers\StatisticsController;
use App\Http\Controllers\SolutionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UsersController;
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

Route::middleware(['redirectIfAuthenticated'])->group(function () {
    Route::get('login', [LoginController::class, 'create'])->name('login');
    Route::post('login', [LoginController::class, 'store'])->name('login');
});

Route::middleware(['restrictRegisterAccess'])->group(function () {
    Route::get('register', [RegisterController::class, 'create'])->name('register');
    Route::post('register', [RegisterController::class, 'store'])->name('register');
});
Route::post('logout', [LoginController::class, 'destroy'])->name('logout');

Route::get('addForm', [ReclamationController::class, 'create'])->name('addForm');
Route::get('infoForm', [ReclamationController::class, 'info'])->name('infoForm');
Route::get('ToutsLesTickets', [TicketController::class, 'index'])->name('indexTickets');
Route::get('/UnTicket/{ticketID}', [TicketController::class, 'showOne'])->name('oneTicket');
Route::patch('/updateTicket/{id}', [TicketController::class, 'edit'])->name('editTicket');
Route::delete('/Tickets/{ticket}', [TicketController::class, 'destroy'])->name('destroyTicket');
Route::patch('/tickets/{ticket}/update-status', [TicketController::class, 'updateStatus'])->name('tickets.updateStatus');


Route::post('/tickets/{ticket}/archive', [TicketController::class, 'archive'])->name('tickets.archive');
Route::get('/tickets/archived', [TicketController::class, 'archivedIndex'])->name('tickets.archived');
Route::post('/tickets/{ticket}/unarchive', [TicketController::class, 'unarchive'])->name('tickets.unarchive');

Route::patch('/tickets/{ticket}/assign', [TicketController::class, 'assignTicket'])->name('assignTicket')->middleware('can:assign,ticket');

Route::post('/tickets/{ticket}/assign', [TicketController::class, 'assign']);

Route::patch('/tickets/{ticket}/update-system', [TicketController::class, 'updateSystem'])->name('tickets.updateSystem');

Route::get('/statistics', [StatisticsController::class, 'index'])->name('statistics.index');


// Guest
Route::get('/guest-ticket', [GuestTicketController::class, 'create'])->name('guest_ticket.create');
Route::get('/submit-ticket', [GuestTicketController::class, 'store'])->name('guest_ticket.store');
Route::post('/submit-ticket', [GuestTicketController::class, 'store'])->name('guest_ticket.store');
Route::get('/track-ticket', [GuestTicketController::class, 'trackForm'])->name('guest_ticket.trackForm');
Route::post('/track-ticket', [GuestTicketController::class, 'track'])->name('guest_ticket.track');
Route::get('/ticket/{tracking_code}', [GuestTicketController::class, 'status'])->name('guest_ticket.status');


//solution 

Route::post('tickets/{ticketId}/solution', [SolutionController::class, 'store'])->name('solution.store');
Route::put('solutions/{solutionId}', [SolutionController::class, 'update'])->name('solution.update');


Route::get('/MonProfile', [ProfileController::class, 'profileView'])->name('profile.showProfile');
// Route::get('/CompleteprofileAssociation', [ProfileController::class, 'storeAssociationView'])->name('profile.CompleteAssociation');
// Route::post('/CompleteprofileAssociation', [ProfileController::class, 'storeAssociation'])->name('profile.storeAssociation');
// Route::get('/ShowProfileAssociation', [ProfileController::class, 'ShowProfileAssociation'])->name('profile.ShowProfileAssociation');

// All Users (Responsable)
Route::get('/TousLesUtilisateurs', [UsersController::class, 'all'])->name('AllUsers');
Route::patch('/users/{user}/update-role', [UsersController::class, 'updateRole'])->name('users.updateRole');
Route::patch('/users/{user}/toggle-archive', [UsersController::class, 'toggleArchive'])->name('users.toggleArchive');
