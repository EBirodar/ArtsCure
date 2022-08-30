<?php

namespace App\Http\Controllers;

use App\Http\Services\ArtistService;
use App\Models\Artist;
use App\Models\Tool;
use App\Models\Toolable;
use Illuminate\Http\Request;

class ArtistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
//     * @return \Illuminate\Http\Response
     */
    public $service;
    public function __construct()
    {
        $this->service=new ArtistService();
    }
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
            'toolList'=>$toolList
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
        $this->service->store($request);
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
        $item=$this->service->edit($artist);
        return view('admin.artists.edit',[
            'artist'=>$artist,
            'toolList'=>$item->toolList,
            'tool_ids'=>$item->tool_ids
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
        $this->service->update($request,$artist);
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
        $this->service->delete($artist);
        return redirect()->route('admin.artists.index');
    }





}
