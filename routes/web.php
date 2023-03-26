<?php

use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\RevisorController;
use App\Models\Announcement;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [PublicController::class, 'home'])->name('homepage');
Route::get('/categoria/{category}', [PublicController::class, 'categoryShow'])->name('categoryShow');
Route::get('/dettaglio/annuncio/{announcement}', [AnnouncementController::class, 'showAnnouncement'])->name('announcements.show');
Route::get('/tutti/annunci', [AnnouncementController::class, 'indexAnnouncement'])->name('announcements.index');
Route::get('contact', [PublicController::class, 'contact'])->name('contact');

Route::middleware(['auth'])->group(function(){
    Route::get('nuovo/annuncio', [AnnouncementController::class, 'createAnnouncement'])->name('announcements.create');
    Route::get('/revisor/home', [RevisorController::class, 'index'])->name('revisor.index');
    Route::patch('/accetta/annuncio/{announcement}', [RevisorController::class, 'acceptAnnouncement'])->name('revisor.accept_announcement');
    Route::patch('/rifiuta/annuncio/{announcement}', [RevisorController::class, 'rejectAnnouncement'])->name('revisor.reject_announcement');
    Route::get('/richiesta/revisore', [RevisorController::class, 'becomeRevisor'])->name('become.revisor');
    Route::get('/rendi/revisor/{user}', [RevisorController::class, 'makeRevisor'])->name('make.revisor');
});


