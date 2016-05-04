<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\komoditi as kom;
use Validator;

class komoditiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('komoditas');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_komoditi' => 'required|unique:komoditi',
        ]);
        if ($validator->fails()) {
           return redirect('komoditas')->withErrors($validator)->withInput();
        }
        $data = $request->all();
        $k = kom::orderBy('id_komoditi', 'desc')->first();
        $data['id_komoditi'] = $k['id_komoditi']+1;
        kom::create($data);
        return redirect('komoditas')->with('success', true);
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nama_komoditi' => 'required|unique:komoditi',
        ]);
        if ($validator->fails()) {
           return redirect('komoditas')->withErrors($validator)->withInput();
        }
        kom::where('id_komoditi',$id)
            ->update(['nama_komoditi'=>$request->get('nama_komoditi')]);
        return redirect('komoditas')->with('Edit', true);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        kom::where('id_komoditi',$id)->delete();
    }
    //apiii
    public function get()
    {
        return kom::get();
    }
}
