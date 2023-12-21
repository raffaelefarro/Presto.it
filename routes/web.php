<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\RevisorController;
use App\Http\Controllers\AnnouncementController;

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

Route::get('/', [PublicController::class, 'welcome'])->name('welcomepage');
Route::get('/announcement/search' , [PublicController::class, 'announcement_search'])->name('announcement_search');
Route::get('/user/profile/{user}', [PublicController::class, 'user_profile'])->name('user_profile');

Route::get('/announcement/create', [AnnouncementController::class, 'announcement_create'])->name('announcement_create');
Route::get('/announcement/index', [AnnouncementController::class, 'announcement_index'])->name('announcement_index');
Route::get('/announcement/show/{announcement}', [AnnouncementController::class, 'announcement_show'])->name('announcement_show');
Route::get('/announcement/category/{category}', [AnnouncementController::class, 'category_show'])->name('category_show');

// Rotta DASHBOARD REVISORE
Route::get('/revisor/dashboard', [RevisorController::class, 'index_show'])->middleware("isRevisor")->name('index_show');
Route::patch('/revisor/announcement/accept/{announcement}', [RevisorController::class, 'accept_announcement'])->middleware("isRevisor")->name('accept_announcement');
Route::patch('/revisor/announcement/reject/{announcement}', [RevisorController::class, 'reject_announcement'])->middleware("isRevisor")->name('reject_announcement');
Route::patch('/revisor/announcement/review/{announcement}', [RevisorController::class, 'review_announcement'])->middleware("isRevisor")->name('review_announcement');
Route::get('/revisor/create',[PublicController::class, 'revisor_create'])->middleware('auth')->name('revisor_create');
Route::post('/revisor/request',[RevisorController::class,'revisor_request'])->middleware('auth')->name('revisor_request');
Route::get('/revisor/request/approve/{email}', [RevisorController::class, 'revisor_accept'])->middleware('auth')->name('revisor_accept');

//Rotta lingue
Route::post('/languages/{lang}', [PublicController::class, 'set_languages'])->name('set_language_local');

// Rotte Privacy Policy
Route::get('/diritti/utente', [PublicController::class, 'diritti_utente'])->name('diritti_utente');
Route::get('/protezione/dati', [PublicController::class, 'protezione_dati'])->name('protezione_dati');
Route::get('/normative/generali', [PublicController::class, 'normative_generali'])->name('normative_generali');
Route::get('/chi-siamo', [PublicController::class, 'chi_siamo'])->name('chi_siamo');


