@extends('layoute.app')
@section('konten')
<div class="row" id="xx">
<div class="col s12">
	<div class="col s12 m12 ">
		<div class="card blue darken-1" style=" padding: 1%;">
			<h5 class="white-text col s12">Input Data</h5>
			<hr/>
			<div class="card grey lighten-3" style=" padding: 1%;">
			<form class="col s12" action="harga" method="POST">
			{!!csrf_field()!!}
		      <div class="row">
		        <div class="input-field col s3">
					<input type="date" size="10" id="icon_prefix" class="datepicker"
					value="{{date('Y-m-d')}}" 
					 name="tanggal">
		          <label for="icon_prefix" class="active">Pilih Tangal</label>
		        </div>
		        <div class="input-field col s4">
		        	@if( Auth::user()->id_pasar == 0)
		        		<input name="id_pasar" class="id_pasar" hidden />
		        		<input class="nm_pasar dropdown-button" data-activates='dd' value="" placeholder="Pilih Pasar" readonly />
						<ul id='dd' class='dropdown-content'>
							<li v-for="p in pasars" onclick="pilihpsr('@{{p.id_pasar}}','@{{p.nama_pasar}}')" ><a href="#!">@{{p.nama_pasar}}</a></li>
						</ul>

		        	@else
		        		<input name="id_pasar" value="{{ Auth::user()->id_pasar }}" hidden />
		        	@endif
		        </div>
		        <button type="button" class="btn btn-raised red darken-3 right" onclick="simpan()">Simpan</button>
		        <button type="submit" hidden class="sbmt">Simpan</button>
			</div>
			
			<table class="bordered">
				<tr>
					<th>No</th>
					<th>Nama Komoditi</th>
					<th>Harga</th>
				</tr>
				<tr v-for="kom in koms">
					<td>@{{$index+1}}</td>
					<td>@{{ kom.nama_komoditi}}</td>
					<td>
						<input name="id_komoditi@{{$index}}" value="@{{kom.id_komoditi}}"  hidden />
						<input name="harga@{{$index}}" value="0" />
					</td>
				</tr>
			</table>
			</form>
			</div>
		</div>
	</div>
</div>
</div>
<script type="text/javascript" src="js/vue.js"></script>
<script type="text/javascript" src="js/vue-resource.js"></script>
<script type="text/javascript">

 $('.datepicker').pickadate({
    selectMonths: false, // Creates a dropdown to control month
    selectYears: 2, // Creates a dropdown of 15 years to control year
    format: 'yyyy-mm-dd'
  });

 function simpan() {
 	if (confirm("Yakin Ingin Simpan? ")) {
 		$('.sbmt').trigger('click');
 	}
 	return false;
 }

 function pilihpsr(i,nm) {
 	$('.id_pasar').val(i);
 	$('.nm_pasar').val(nm);
 }

 new Vue({
    el: '#xx',

    data : {
      koms : [],
      pasars : []
    },

    ready: function() {
      this.ambilPasar();
      this.ambilData();
    },

    methods:{
      ambilData: function() {
        this.$http.get('{{url('json/komoditas')}}', function (argument) {
          this.koms = argument;
        });
      },
      ambilPasar: function() {
        this.$http.get('{{url('json/pasar')}}', function (argument) {
          this.pasars = argument;
        });
      }
    }
  });
</script>
@if (count($errors) > 0)
			@foreach ($errors->all() as $error)
			<script type="text/javascript">
				Materialize.toast('<?php echo $error ?>', 3000);
			</script>
			@endforeach
	@endif
	@if (session('success'))
			<script type="text/javascript">
				Materialize.toast('Data Berhasil Disimpan', 3000);
			</script>
	@endif
	@if (session('eror'))
			<script type="text/javascript">
				Materialize.toast('Data Sudah pernah terinput', 3000);
			</script>
	@endif
	@if (session('Edit'))
			<script type="text/javascript">
				Materialize.toast('Data Berhasil Diubah', 3000);
			</script>
	@endif
@endsection