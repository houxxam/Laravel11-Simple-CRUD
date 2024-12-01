<?php

use App\Http\Controllers\MembersController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route to display the list of members
Route::get('/members', [MembersController::class, 'index'])->name('members.index');

// Route to display the create member form
Route::get('/members/create', [MembersController::class, 'create'])->name('members.create');

// Route to store new member data
Route::post('/members', [MembersController::class, 'store'])->name('members.store');

// Route to show  member data
Route::get('/members/{id}', [MembersController::class, 'show'])->name('members.show');

// Route to Edit  member data
Route::get('/members/{id}/edit', [MembersController::class, 'edit'])->name('members.edit');

// Route to update  member data
Route::put('/members/{id}', [MembersController::class, 'update'])->name('members.update');

// Route to Delete  member data
Route::delete('/members/{id}', [MembersController::class, 'destroy'])->name('members.destroy');
