<?php

namespace App\Http\Controllers;

use App\Film;

class FilmController extends Controller
{
  public function index()
  {
    $films = Film::all();

    return view('front.index', compact('films'));
  }

  public function show($id)
  {
    $film = Film::find($id);

    return view('front.show', compact('film'));
  }
}
