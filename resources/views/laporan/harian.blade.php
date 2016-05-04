<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<style type="text/css">
		body{
			width: 100%;	
			font-family: times;
		}
		.h{
			text-align: center;
			width: 100%;
		}
		.m{
			margin:4px;
		}
		.grs{
			border: 1px solid black;
			margin: 0px;
		}
		.img-header{
			position: fixed;
			top: 0px;
			left: 8px;
			height: 75px;
			width: 100px;
		}
		.tb{
			margin-top: 15px;
			width: 99%;
			font-size: 10pt;
		}
		.tb tr th  {
			border: 1px solid black;
		}
		.tb tr td  {
			border: 1px solid black;
		}
		.tb table tr th  {
			border:none;
			border-bottom: 1px solid black;
		}
		.tb table tr td  {
			border: none;
		}
	</style>
</head>
<body>
	<?php 
		$path = 'images/logo.png';
		$type = pathinfo($path, PATHINFO_EXTENSION);
		$data = file_get_contents($path);
		$base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
		$no = 1;
	 ?>
	 <img src="{{$base64}}" class="img-header">
<div class="h">
	<h4 class="m">PEMERINTAH KABUPATEN BATANG</h4>
	<h3 class="m">Dinas Perindustrian, Perdagangan dan Koperasi</h3>
	<h5 class="m">Alamat : Jl. Slamet Riyadi No. 27 Batang, telp. 51214</h5>
	<hr style="margin-bottom: 1px">
	<hr class="grs">
</div>
<div class="h">
	<h3> <u> Laporan Harga Komoditas Pasar {{$pasar}} </u></h3>
	<p>Tanggal {{$tgl}} </p>
<table class="tb" cellspacing="0">
	<tr>
		<th>No</th>
		<th>Nama Komoditi</th>
		<th>Harga</th>
	</tr>
	@foreach($harga as $a)
		<tr>
			<td style="text-align:center;"><?php echo $no;$no++; ?></td>
			<td><?php echo $a['nama_komoditi'] ?></td>
			<td style="text-align:center;">
				<?php echo number_format($a['getHarga']['harga'],2,'.',',');?>
			</td>
		</tr>
	@endforeach
</table>

</div>

</body>
</html>

