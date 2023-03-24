<?php

use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\PublicController;
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

Route::middleware(['auth'])->group(function(){
    Route::get('nuovo/annuncio', [AnnouncementController::class, 'createAnnouncement'])->name('announcements.create');
    
});


