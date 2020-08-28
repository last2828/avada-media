<?php

namespace App\Http\Controllers\Admin;

use App\Film;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class FilmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $films = Film::all();
        return view('admin.index', compact('films'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $data = $request->except('_token');
      $rules = [
        'title' => 'required|unique:films|string|max:255',
        'description' => 'string|max:255',
        'status' => 'required|boolean',
        'producer' => 'string|max:255',
        'company' => 'string|max:255'
      ];

      $validator = Validator::make($data, $rules);

      if($validator->fails())
      {
        return view('admin.create')->with(['errors' => $validator->errors()]);
      }

      Film::create($data);

      return redirect()->route('films.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      return redirect()->route('show_film', $id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $film = Film::find($id);

        return view('admin.edit', compact('film'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $data = $request->except(['_token', '_method']);
      $rules = [
        'title' => ['required', Rule::unique('films')->ignore($id), 'string', 'max:255'],
        'description' => 'string|max:255',
        'status' => 'required|boolean',
        'producer' => 'string|max:255',
        'company' => 'string|max:255'
      ];

      $validator = Validator::make($data, $rules);

      if($validator->fails())
      {
        return view('admin.update', $id)->with(['errors' => $validator->errors()]);
      }

      Film::where('id', $id)->update($data);

      return redirect()->route('films.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      Film::destroy($id);

      return redirect()->route('films.index');
    }
}
