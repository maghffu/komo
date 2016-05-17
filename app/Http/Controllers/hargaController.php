<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\harga;
use Validator;
use DB;

class hargaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('harga');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('edit_data');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $r = $request->all();
        $f = (count($r)/2)-1;
        DB::beginTransaction();
        for ($i=0; $i < $f-1; $i++) { 

            $validator = Validator::make($r, [
                'id_komoditi'.$i => 'required',
                'id_pasar' => 'required',
            ]);
            if ($validator->fails()) {
                DB::rollback();
               return redirect('harga')->withErrors($validator)->withInput();
            }

            
            if (isset($r['edit'])) {
                $h = harga::
                where('id_komoditi', $r['id_komoditi'.$i])
                ->where('tanggal', $r['tanggal'])
                ->where('id_pasar', $r['id_pasar'])
                ->update( ['harga' => $r['harga'.$i]] );
            }else{
                $cek = harga::where('tanggal',$r['tanggal'])
                ->where('id_pasar',$r['id_pasar'])
                ->where('id_komoditi',$r['id_komoditi'.$i])
                ->first();

                if (count($cek) > 0) {
                    DB::rollback();
                   return redirect('harga')->with('eror',true);
                }

                $data = array(
                'id_komoditi' => $r['id_komoditi'.$i],
                'tanggal' => $r['tanggal'],
                'harga' => $r['harga'.$i],
                'id_pasar'=>$r['id_pasar']
                 );

                harga::create($data);
            }
        }
            DB::commit();
            if (isset($r['edit'])) {
                return redirect('harga/create')->with('success',true);
            }else{
                return redirect('harga')->with('success',true);
            }
        // 'email' => 'unique:users,email_address,NULL,id,account_id,1'
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
    public function edit($id, Request $r)
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
        return $request;
        $r = $request->all();
        
        $f = (count($r)/2)-1;
        DB::beginTransaction();
        for ($i=0; $i < $f-1; $i++) { 

            $validator = Validator::make($r, [
                'id_komoditi'.$i => 'required',
                'id_pasar' => 'required',
            ]);
            if ($validator->fails()) {
                DB::rollback();
               return redirect('harga/create')->withErrors($validator)->withInput();
            }

            $cek = harga::where('tanggal',$r['tanggal'])
                ->where('id_pasar',$r['id_pasar'])
                ->where('id_komoditi',$r['id_komoditi'.$i])
                ->first();

            if (count($cek) > 0) {
                DB::rollback();
               return redirect('harga/create')->with('eror',true);
            }

            $data = array(
                'id_komoditi' => $r['id_komoditi'.$i],
                'tanggal' => $r['tanggal'],
                'harga' => $r['harga'.$i],
                'id_pasar'=>$r['id_pasar']
                 );
            harga::firstOrCreate($data);
        }
            DB::commit();
           return redirect('harga/create')->with('success',true);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function get()
    {
        return harga::get();
    }
}
