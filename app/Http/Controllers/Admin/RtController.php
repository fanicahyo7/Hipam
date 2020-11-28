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
        $item = Rt::with(['rtrwrelasi'])->where('id_rt','!=',0)->get();

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
        $rws = Rw::where('id_rw','!=',0)->get();
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

        $jml = Rt::where('id_rt','=',$request['id_rt'])
        ->where('id_rw','=',$request['id_rw'])
        ->count();

        $jmlsampah = Rt::onlyTrashed()->where('id_rt','=',$request['id_rt'])
        ->where('id_rw','=',$request['id_rw'])
        ->count();

        if ($jmlsampah != 0){
            $sampah = Rt::onlyTrashed()->where('id_rt','=',$request['id_rt'])
                    ->where('id_rw','=',$request['id_rw']);
            $sampah->restore();
            return redirect()->route('rt.index');
        }

        if ($jml <= 0){
            Rt::create($data);
            return redirect()->route('rt.index');
        }else{
            return redirect()->back()->withErrors(['Duplicate Data']);
        }
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
    public function edit($id_rt,$id_rw)
    {
        $rws = Rw::where('id_rw','!=',0)->get();
        $item = Rt::with(['rtrwrelasi'])->where('id_rt','=',$id_rt)
        ->where('id_rw','=',$id_rw)->first();
        
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

        $item = Rt::where('id_rt','=',$request['id_rt'])
        ->where('id_rw','=',$request['id_rw'])->first();

        $jml = Rt::where('id_rt','=',$request['id_rt'])
                ->where('id_rw','=',$request['id_rw'])
                ->count();

        $jmlsampah = Rt::onlyTrashed()->where('id_rt','=',$request['id_rt'])
                ->where('id_rw','=',$request['id_rw'])
                ->count();

        if ($jmlsampah != 0){
            $sampah = Rt::onlyTrashed()->where('id_rt','=',$request['id_rt'])
                    ->where('id_rw','=',$request['id_rw']);
            $sampah->restore();
            return redirect()->route('rt.index');
        }

        if ($jml <= 0){
            $item->update($data);
            return redirect()->route('rt.index');
        }else{
            return redirect()->back()->withErrors(['Duplicate Data']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_rt,$id_rw)
    {
        $data['user_delete'] = Auth::user()->username;
        $item = Rt::where('id_rt','=',$id_rt)
                ->where('id_rw','=',$id_rw);
        $item->update($data);
        $item->delete();

        return redirect()->route('rt.index');
    }
}
