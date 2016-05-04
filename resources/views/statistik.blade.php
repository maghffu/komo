@extends('welcome')
 @section('konten')
 <div id="app">
      <div class="card grey lighten-2 col m12">
        <div class="card-content">
          <h5>Statistik Harga Pangan Per Wilayah</h5>
          
      <div class="card grey lighten-4">
        <div class="col s12">
          <div class="row">
          <div class="col s2" style="padding: 2%;">
            <h6><b>Perkembangan di</b></h6>
          </div>
          <div class="input-field col s3">
            <input class="nm_pasar dropdown-button" data-activates='dd' v-model="nama" style="width: 100%;" readonly />
            <ul id='dd' class='dropdown-content'>
              <li v-for="p in pasars" v-on:click="pilihpasar(p.id_pasar,p.nama_pasar)" ><a href="#!">@{{p.nama_pasar}}</a></li>
            </ul>

          </div>
				<div class="input-field col s3">
        <input type="hidden" v-model="id" class="id" />
					<input type="date" size="10" id="icon_prefix" class="datepicker tgl"
					value="{{date('Y-m-d')}}" 
					 name="tanggal"
					 v-model="tgl">
		          <label for="icon_prefix" class="active">Pilih Tangal</label>
		        </div>
				<div class="input-field col s4">
				<button class="btn btn-raised col s5 m5 " v-on:click="pilihtanggal()">Cari</button>
				<a class="btn btn-raised  teal darken-3 col s5 m5 offset-m1 offset-s1" onclick="cetak()">
						<i class="material-icons ">vertical_align_bottom</i> Download
					</a>
		        </div>
					
        </div>
        </div>
          <div class="tb" >
          <div class="st" hidden>Memuat data ... </div>
          <table class="bordered ">
              <tr>
                <th>No</th>
                <th>Nama Komoditi</th>
				        <th>Harga</th>
              </tr>

              <tr v-for="p in pasar.data ">
                <td>@{{ $index+1 }}</td>
                <td>@{{p.nama_komoditi}}</td>
                <td>@{{p.get_harga.harga | currency 'Rp '}}</td>
              </tr>
          </table>
        </div>
        </div>
      </div>
    </div>
    </div>
  </div>


</body>

<script type="text/javascript" src="js/vue.js"></script>
<script type="text/javascript" src="js/vue-resource.js"></script>
<script type="text/javascript">
$('.datepicker').pickadate({
	selectMonths: false, // Creates a dropdown to control month
	selectYears: 2, // Creates a dropdown of 15 years to control year
	format: 'yyyy-mm-dd'
  });
  
  function pilihtgl(){
	  var tg = $('.datepicker').val();
  }

  function cetak() {
    var tg = $('.tgl').val();
    var id = $('.id').val();
    window.location = "{{url('cetak/rekap')}}"+"/"+id+"/"+tg;
  }
  
 var vm = new Vue({
    el: '#app',

    data : {
      pasar : [],
      pasars : [],
	  tgl : '',
	  nama : "Batang",
	  id : 3,
      thn : [2010,2011,2012,2013,2014,2015,2016],
      bulan : 
        [
          {'id':'1','bln':'Januari'},
          {'id':'2','bln':'Pebruari'},
          {'id':'3','bln':'Maret'},
          {'id':'4','bln':'April'},
          {'id':'5','bln':'Mei'},
          {'id':'6','bln':'Juni'},
          {'id':'7','bln':'Juli'},
          {'id':'8','bln':'Agustus'},
          {'id':'9','bln':'September'},
          {'id':'10','bln':'Oktober'},
          {'id':'11','bln':'Nopember'},
          {'id':'12','bln':'Desember'},
        ],
      cari_pasar : "",
      jml : 0,
	tgl : '{{date("Y-m-d")}}'
    },

    ready: function(argument) {
      this.ambilData();
      this.ambilPasar();
    },

    methods:{
      ambilData: function() {
        this.$http.get('{{url('view')}}'+'/'+this.id+'/'+'{{date("Y-m-d")}}', function (argument) {
          this.pasar = argument;
          
        });
      },
      ambilPasar: function() {
        this.$http.get('{{url('json/pasar')}}', function (argument) {
          this.pasars = argument;
        });
      },
       pilihpasar: function(id,nm) {
		   $('.st').slideDown('fast');
		   $('.tb').hide();
          this.$http.get('{{url('view')}}'+'/'+id+'/'+this.tgl, function (argument) {
                this.pasar = argument;
            });
		   $('.st').hide();
		   $('.tb').slideDown('medium');
		   this.id=id;
		   this.nama = nm;
      },
	 pilihtanggal:function (e) {
		   $('.st').slideDown('fast');
		   $('.tb').hide();
		   console.log('{{url('view')}}'+'/'+this.id+'/'+this.tgl);
			  this.$http.get('{{url('view')}}'+'/'+this.id+'/'+this.tgl, function (argument) {
					this.pasar = argument;
				});
		   $('.st').hide();
		   $('.tb').slideDown('medium');
      }
	 
    }


  });
</script>

            <!-- Toast Notification -->

@endsection
