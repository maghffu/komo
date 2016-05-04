@extends('layoute.app')
@section('konten')
<div class="row" id="pasar">
<div class="col s12">
	<div class="col s12 m5 " style="position: fixed;">
		<div class="card blue darken-1" style=" padding: 1%;">
			<h5 class="white-text col s12">Form Komoditi</h5>
			<hr/>
			<div class="card grey lighten-4 col s12 m12 right">
				<form method="POST" action="{{url('komoditas')}}" class="f">
					<div class="row input-field">
						{!!csrf_field()!!}
						<input type="hidden" name="_method" value="PUT" class="mtd">
						<input type="hidden" v-model="id" class="id" />
						<input type="text" v-model="nama_pasar" name="nama_komoditi" />
						<label class="active">Nama Komoditi</label>
					</div>
					<div class="row">
						<button type="button" onclick="simpan()" class="btn btn-raised cyan darken-4">Simpan</button>
						<button type="submit" class="sbmt" hidden></button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<div class="col s12 m6 offset-m6">
		<div class="card blue darken-1" style=" padding: 1%;">
			<h5 class="white-text col s12">Data Komoditi</h5>
			<hr/>
			Cari <input v-model="cari" />
			<div class="card grey lighten-4 col s12 m12 right">
				<table class="bordered">
					<tr>
						<th>No</th>
						<th>Nama Komoditi</th>
						<th>Aksi</th>
					</tr>
					<tr v-for="p in pasar | filterBy cari" v-on:click="klik(p.id_komoditi,p.nama_komoditi)" style="cursor: pointer;">
						<td>@{{ $index+1 }}</td>
						<td>@{{ p.nama_komoditi }}</td>
						<td>
							<button type="button"  v-on:click="hps($index, p.id_komoditi,'{{ csrf_token() }}')" class="btn btn-raised">x</button>
						</td>
					</tr>
				</table>
			</div>
		</div>
	</div>
</div>
</div>
<script type="text/javascript">
	function simpan() {
		if ( $('.id').val() == "" ) {
			$('.mtd').remove();
		}else{
			$(".f").attr("action", "{{url('komoditas')}}"+"/"+$('.id').val());
		}
		$('.sbmt').trigger('click');
	}
	/*function hapus(i) {
		if (confirm("Yakin Ingin Hapus?")) {
			window.location = '{{url("pasar")}}'+'/'+i;
		}
		return false;
	}*/
</script>
<script type="text/javascript" src="js/vue.js"></script>
<script type="text/javascript" src="js/vue-resource.js"></script>
<script type="text/javascript">
  new Vue({
    el: '#pasar',

    data : {
      pasar : [],
      nama_pasar : "",
      id : "",
      cari : "",
    },

    ready: function(argument) {
      this.ambilData();
    },

    methods:{
      ambilData: function() {
        this.$http.get('{{url('json/komoditas')}}', function (argument) {
          this.pasar = argument;
        });
      },
      klik:function(id,nm) {
      	this.nama_pasar = nm;
      	this.id = id;
      },
      hps:function(n,i,tok) {
      	if (confirm("Yakin Ingin Hapus?")) {
      		this.$http.delete('{{url('komoditas')}}'+'/'+i,{'_token':tok }).then(function (response) {
      			Materialize.toast('Data Berhasil Dihapus', 3000);
      			this.ambilData();
      			this.nama_pasar = "";
      			this.cari = "";
		     })
      	}
      	return false;
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
	@if (session('Edit'))
			<script type="text/javascript">
				Materialize.toast('Data Berhasil Diubah', 3000);
			</script>
	@endif
@endsection