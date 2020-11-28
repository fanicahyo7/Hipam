<?php

namespace App\Http\Controllers\Admin;

use App\Retribusi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Admin\RetribusiRequest;

class RetribusiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $item = Retribusi::where('id','!=',1)->get();

        return view('pages.admin.retribusi.index',[
            'items' => $item
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.retribusi.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RetribusiRequest $request)
    {
        $data = $request->all();
        $data['user_entry'] = Auth::user()->username;

        Retribusi::create($data);
        return redirect()->route('retribusi.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_retribusi)
    {
        $item = Retribusi::findOrFail($id_retribusi);
        
        return view('pages.admin.retribusi.edit',[
            'item' => $item
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RetribusiRequest $request, $id_retribusi)
    {
        $data = $request->all();
        $data['user_update'] = Auth::user()->username;

        $item = Retribusi::findOrFail($id_retribusi);
        $item->update($data);
        return redirect()->route('retribusi.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data['user_delete'] = Auth::user()->username;
        $item = Retribusi::findOrFail($id);
        $item->update($data);
        $item->delete();

        return redirect()->route('retribusi.index');
    }
}
