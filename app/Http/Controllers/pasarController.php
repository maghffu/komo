<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\pasar;
use Validator;

class pasarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pasar');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
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
            'nama_pasar' => 'required|unique:pasar',
        ]);
        if ($validator->fails()) {
           return redirect('pasar')->withErrors($validator)->withInput();
        }
        pasar::create($request->all());
        return redirect('pasar')->with('success', true);
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
            'nama_pasar' => 'required|unique:pasar',
        ]);
        if ($validator->fails()) {
           return redirect('pasar')->withErrors($validator)->withInput();
        }
        pasar::where('id_pasar',$id)
            ->update(['nama_pasar'=>$request->get('nama_pasar')]);
        return redirect('pasar')->with('Edit', true);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        pasar::where('id_pasar',$id)->delete();
    }


    // api
    public function get()
    {
        return pasar::get();
    }
}   
