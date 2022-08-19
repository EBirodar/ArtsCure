<?php

namespace App\Http\Controllers;

use App\Models\Tool;
use Illuminate\Http\Request;

class ToolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
//     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tools=Tool::orderByDesc('created_at')->paginate(5);

        return view('admin.tools.index',['tools'=>$tools]);
    }

    /**
     * Show the form for creating a new resource.
     *
//     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tools.create');
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

        Tool::create($request->all());
        return redirect()->route('admin.tools.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
//     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tool=Tool::find($id);
        return view('admin.tools.show',['tool'=>$tool]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
//     * @return \Illuminate\Http\Response
     */
    public function edit(Tool $tool)
    {
        return view('admin.tools.edit',[
            'tool'=>$tool
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
//     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tool $tool)
    {
        $this->validateData($request);
        $tool->update($request->all());
        return redirect()->route('admin.tools.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
//     * @return \Illuminate\Http\Response
     */
    public function destroy(Tool $tool)
    {
        $tool->delete();
        return redirect()->route('admin.tools.index');
    }

    public function validateData($request)
    {
        return $request->validate([
            'name'
        ]);

    }
}
