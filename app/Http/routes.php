<?php

Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');
Route::get('/', function () {
	return redirect('statistik');
    return view('home');
});
Route::get('statistik', function () {
    return view('statistik');
});
Route::get('kontak', function () {
    return view('kontak');
});
Route::get('info_pasar', function () {
    return view('info_pasar');
});
Route::get('tentang', function () {
    return view('tentang_kami');
});

$date = date('Y-m-d');

Route::group(['middleware' => array('auth')], function () {
	Route::resource('harga','hargaController');
	Route::resource('komoditas','komoditiController');
	Route::resource('pasar','pasarController');
	Route::get('beranda',function ()
	{
		return view('beranda');
	});
	

});

Route::group(['prefix' => 'json', 'middleware'=>['cors'] ], function () {
    Route::get('pasar','pasarController@get');
    Route::get('komoditas','komoditiController@get');
	Route::get('harga','hargaController@get');


	Route::get('/',function()
	{
		$js = array();
		$i = 0;
		$data = App\pasar::get();
		foreach ($data as $d) {
			$datapasar = DB::table('harga')
				->select('komoditi.id_komoditi','komoditi.nama_komoditi','harga.harga','harga.tanggal')
				->join('komoditi', 'komoditi.id_komoditi', '=', 'harga.id_komoditi')
				->where('harga.id_pasar','=',$d['id_pasar'])
				->get();
			$js = $d;
			$js['data_pasar'] = $datapasar;
			$i++;
		}
		return Response::json(
			[0 => [
	         'data' => $js,
	         'kabupaten'=>'batang'
	    	]]
	    , 200);
	});


	Route::get('/{pasar}/{tanggal}',function($pasar = null,$tanggal)
	{
		$js = array();
		$i = 0;
		$data = App\pasar::where('id_pasar',$pasar)->first();
		$js = $data;
		foreach ($data as $d) {
			$datapasar = DB::table('harga')
				->select('komoditi.id_komoditi','komoditi.nama_komoditi','harga.harga','harga.tanggal')
				->join('komoditi', 'komoditi.id_komoditi', '=', 'harga.id_komoditi')
				->where('harga.id_pasar', $pasar)
				->where('harga.tanggal', $tanggal)
				->get();
			$js['data_pasar'] = $datapasar;
			$i++;
		}
		return Response::json(
			[0 => [
	         'data' => $data,
	         'kabupaten'=>'batang'
	   		 ]]
			, 200);
	});

});

Route::get('view/{pasar}/{tanggal}',function($pasar = 1,$tanggal)
	{
		if ($tanggal == Null) {
			$tanggal = date('Y-m-d');
		}
		$datapasar = App\komoditi::with(['getHarga' => function ($q) use($pasar,$tanggal)
		{
			$q->where('id_pasar',$pasar)->where('tanggal',$tanggal);
		}])->get();

		return Response::json(
			[
	         'data' => $datapasar,
	         'kabupaten'=>'batang'
	    	]
	    , 200);
	});
Route::get('cetak/rekap/{pasar}/{tanggal}',function($pasar,$tanggal)
	{
		if ($tanggal == Null) {
			$tanggal = date('Y-m-d');
		}
		$datapasar = App\komoditi::with(['getHarga' => function ($q) use($pasar,$tanggal)
		{
			$q->where('id_pasar',$pasar)->where('tanggal',$tanggal);
		}])->get();
		$ps = App\pasar::where('id_pasar',$pasar)->first();
		// return view('laporan.harian', ['harga'=>$datapasar,'tgl'=>$tanggal,'pasar'=>$ps->nama_pasar ]);
		$view = View::make('laporan.harian', ['harga'=>$datapasar,'tgl'=>$tanggal,'pasar'=>$ps->nama_pasar ]);
		$contents = (string) $view;

		$pdf = PDF::loadHTML($contents);
		return $pdf->download('laporan.pdf');
	});
