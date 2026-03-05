<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\IssueController;
use App\Http\Controllers\ItemController;
use Illuminate\Support\Facades\Route;


Route::get('/', [IssueController::class, 'index'])->name('home');
Route::resource('issues', IssueController::class)->except(['show']);
