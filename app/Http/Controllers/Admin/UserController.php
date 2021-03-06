<?php

namespace App\Http\Controllers\Admin;

use App\Rt;
use App\Rw;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Admin\UserRequest;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rts = Rt::where('id_rt','!=',0)->get();
        $rws = Rw::where('id_rw','!=',0)->get();
        $item = User::with(['userrwrelasi','userrtrelasi'])->get();

        return view('pages.admin.user.index',[
            'items' => $item,
            'rts' => $rts,
            'rws' => $rws
        ]);
    }

    public function cari(Request $request)
	{
		// menangkap data pencarian
        $name = $request->name;
        $rt = $request->id_rt;

        // if (empty($name)){
        //     $name="";
        // }
        // if (empty($rt)){
        //     $rt="";
        // }
 
    	// mengambil data dari table pegawai sesuai pencarian data
        $item = User::where('name','like',"%".$name."%")
        ->where('id_rt','=',$rt)
		->paginate();
 
        $rts = Rt::where('id_rt','!=',0)->get();
        $rws = Rw::where('id_rw','!=',0)->get();
    		// mengirim data pegawai ke view index
		return view('pages.admin.user.index',[
            'items' => $item,
            'rts' => $rts,
            'rws' => $rws
        ]);
 
	}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rts = Rt::where('id_rt','!=',0)->get();
        $rws = Rw::where('id_rw','!=',0)->get();
        return view('pages.admin.user.create',[
            'rts' => $rts,
            'rws' => $rws
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $data = $request->all();
        $data['password'] = Hash::make($request['password']);
        $data['passwordnohash'] = $request['password'];
        $data['user_entry'] = Auth::user()->username;

        User::create($data);
        return redirect()->route('user.index');
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
        $rts = Rt::all();
        $rws = Rw::all();
        // $rts = Rt::where('id_rt','!=',0)->get();
        // $rws = Rw::where('id_rw','!=',0)->get();
        $item = User::with(['userrwrelasi','userrtrelasi'])->findOrFail($id);
        
        return view('pages.admin.user.edit',[
            'item' => $item,
            'rts' => $rts,
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
    public function update(UserRequest $request, $id)
    {
        $data = $request->all();
        $data['user_update'] = Auth::user()->username;

        $item = User::findOrFail($id);
        $item->update($data);
        return redirect()->route('user.index');
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
        $item = User::findOrFail($id);
        $item->update($data);
        $item->delete();

        return redirect()->route('user.index');
    }
}
