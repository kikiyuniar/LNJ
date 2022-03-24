<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\InitiatorController;
use App\Http\Controllers\RecipientController;
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

Route::get('/', [Controller::class, 'show_dashboard']);

Route::get('initiators_post', [InitiatorController::class, 'index']);
Route::get('initiators', [InitiatorController::class, 'show']);
Route::post('action_initiator', [InitiatorController::class, 'create'])->name('post.initiator');
Route::post('action_edit_initiator/{id}', [InitiatorController::class, 'edit']);
Route::get('action_del_initiator/{id}', [InitiatorController::class, 'destroy']);

Route::get('recipient_post', [RecipientController::class, 'index']);
Route::get('recipient', [RecipientController::class, 'show']);
Route::post('action_recipient', [RecipientController::class, 'create'])->name('post.recipient');
Route::get('action_edit_recipient/{id}', [RecipientController::class, 'edit']);
Route::get('action_del_recipient/{id}', [RecipientController::class, 'destroy']);
