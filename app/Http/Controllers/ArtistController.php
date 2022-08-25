<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use App\Models\Tool;
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
        $artists=Artist::with('tools')->orderByDesc('created_at')->paginate(5);

        return view('admin.artists.index',['artists'=>$artists]);
    }

    /**
     * Show the form for creating a new resource.
     *
//     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $toolList=Tool::all();
        return view('admin.artists.create',[
            'toolList'=>$toolList,
            ''
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
//     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

//        $this->validateData($request);
        $artist= new Artist();
        $artist->first_name_uz=$request->first_name_uz;
        $artist->last_name_uz=$request->last_name_uz;
        $artist->speciality=$request->speciality;
        $artist->rate=$request->rate;
        $artist->category_id=$request->category_id;
        $artist->description_uz=$request->description_uz;
        $artist->muzey_uz=$request->muzey_uz;
        $artist->medal_uz=$request->medal_uz;
        $artist->views=$request->views;
        $artist->save();
        foreach ($request->tools as $id)
        {
            $tool=Tool::find($id);
            $artist->tools()->attach($tool);
        }

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
        dd($artist->tools());

        $toolList=Tool::all();
        return view('admin.artists.edit',[
            'artist'=>$artist,
            'toolList'=>$toolList
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
