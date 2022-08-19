<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use Illuminate\Http\Request;

class ArtistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
//     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $artists=Artist::orderByDesc('created_at')->paginate(5);

        return view('admin.artists.index',['artists'=>$artists]);
    }

    /**
     * Show the form for creating a new resource.
     *
//     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.artists.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
//     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validateData($request);

        Artist::create($request->all());
        return redirect()->route('admin.artists.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
//     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $artist=Artist::find($id);
        return view('admin.artists.show',['product'=>$artist]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
//     * @return \Illuminate\Http\Response
     */
    public function edit(Artist $artist)
    {
        return view('admin.artists.edit',[
            'artist'=>$artist
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
//     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Artist $artist)
    {
        $this->validateData($request);
        $artist->update($request->all());
        return redirect()->route('admin.artists.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
//     * @return \Illuminate\Http\Response
     */
    public function destroy(Artist $artist)
    {

        $artist->delete();
        return redirect()->route('admin.artists.index');
    }

    public function validateData($request)
    {
        return $request->validate([
            'first_name_uz'=>'required',
            'last_name_uz'=>'required',
            'speciality'=>'required',
            'rate'=>'required',
            'category_id'=>'required',
            'muzey_uz'=>'string',
            'views'=>'string'
        ]);

    }
}
