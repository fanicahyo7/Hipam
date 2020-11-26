<?php

namespace App\Http\Controllers\Admin;

use App\Rt;
use App\Rw;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Admin\RtRequest;

class RtController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $item = Rt::with(['rtrwrelasi'])->get();

        return view('pages.admin.rt.index',[
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
        $rws = Rw::all();
        return view('pages.admin.rt.create',[
            'rws' => $rws
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RtRequest $request)
    {
        $data = $request->all();
        $data['user_entry'] = Auth::user()->username;

        Rt::create($data);
        return redirect()->route('rt.index');
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
        $rws = Rw::all();
        $item = Rt::with(['rtrwrelasi'])->findOrFail($id);
        
        return view('pages.admin.rt.edit',[
            'item' => $item,
            'rws' => $rws
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RtRequest $request, $id)
    {
        $data = $request->all();
        $data['user_update'] = Auth::user()->username;

        $item = Rt::findOrFail($id);
        $item->update($data);
        return redirect()->route('rt.index');
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
        $item = Rt::findOrFail($id);
        $item->update($data);
        $item->delete();

        return redirect()->route('rt.index');
    }
}
