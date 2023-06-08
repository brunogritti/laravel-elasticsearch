<?php

use Illuminate\Support\Facades\Route;
use App\Repositories\ArticlesRepository;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', function () {
    return view('articles.index', [
        'articles' => \App\Models\Article::all(),
    ]);
});

Route::get('/search', function (ArticlesRepository $repository) {
    $articles = $repository->search((string) request('q'));

    return view('articles.index', [
        'articles' => $articles,
    ]);
});