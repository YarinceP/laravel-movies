<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

class MovieController extends Controller
{
    public function index()
    {
        $popular_movies = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/movie/popular')
            ->json()['results'];

        $nowPLayingMovies = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/movie/now_playing')
            ->json()['results'];

        $genresArray = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/genre/movie/list')
            ->json()['genres'];

        $genres = collect($genresArray)->mapWithKeys(function ($genre) {
            return [$genre['id'] => $genre['name']];
        });
        return view('index', compact('popular_movies','genres','nowPLayingMovies'));
    }

    public function show()
    {
        return view('show');
    }
}
