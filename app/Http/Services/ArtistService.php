<?php

namespace App\Http\Services;

use App\Item\ArtistEditItem;
use App\Models\Artist;
use App\Models\Tool;
use App\Models\Toolable;

class ArtistService
{
    public function store($request)
    {
        $this->validateData($request);
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
    }

    public function update($request,$artist)
    {
        $this->validateData($request);
        $artist->update($request->all());
        Toolable::where('toolable_type','Artist')->where('toolable_id',$artist->id)->delete();

        foreach ($request->tools as $id)
        {
            $tool=Tool::find($id);
            $artist->tools()->attach($tool);
        }
    }

    public function edit($artist)
    {
        $item=new ArtistEditItem();
        $item->toolList=Tool::all();
        $item->tool_ids = [];
        foreach($artist->tools as $tool){
            array_push($tool_ids,$tool->id);
        }
        return $item;

    }

    public function delete($artist)
    {
        Toolable::where('toolable_type','Artist')->where('toolable_id',$artist->id)->delete();
        $artist->delete();
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
