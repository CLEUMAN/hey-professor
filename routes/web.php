<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Question\LikeController;
use App\Http\Controllers\Question\UnlikeController;
use App\Http\Controllers\Question\PublishController;

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

    if(app()->isLocal()){
        $user = \App\Models\User::select()->first();
        auth()->loginUsingId($user->id);
        return to_route('dashboard');
    }
    return view('welcome');
});

Route::get('/dashboard', DashboardController::class)->middleware(['auth', 'verified'])->name('dashboard');



Route::middleware('auth')->group(function () {

    Route::get('/question', [QuestionController::class, 'index'])->name('question.index');
    Route::post('/question/store',[QuestionController::class, 'store'])->name('question.store');
    route::put('/question/publish/{question}', PublishController::class)->name('question.publish');
    Route::post('/question/like/{question}', LikeController::class)->name('question.like');
    Route::post('/question/unlike/{question}', UnlikeController::class)->name('question.unlike');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
