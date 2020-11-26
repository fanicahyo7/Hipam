<?php

namespace App\Http\Controllers\Admin;

use App\Rw;
use App\Retribusi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Admin\RwRequest;

class RwController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $item = Rw::with(['rwretribusirelasi'])->get();

        return view('pages.admin.rw.index',[
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
        $retribusis = Retribusi::all();
        return view('pages.admin.rw.create',[
            'retribusis' => $retribusis
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RwRequest $request)
    {
        $data = $request->all();
        $data['user_entry'] = Auth::user()->username;

        Rw::create($data);
        return redirect()->route('rw.index');
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
    public function edit($id)
    {
        $retribusis = Retribusi::all();
        $item = Rw::with(['rwretribusirelasi'])->findOrFail($id);
        
        return view('pages.admin.rw.edit',[
            'item' => $item,
            'retribusis' => $retribusis
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RwRequest $request, $id)
    {
        $data = $request->all();
        $data['user_update'] = Auth::user()->username;

        $item = Rw::findOrFail($id);
        $item->update($data);
        return redirect()->route('rw.index');
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
        $item = Rw::findOrFail($id);
        $item->update($data);
        $item->delete();

        return redirect()->route('rw.index');
    }
}
