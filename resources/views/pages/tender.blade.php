@extends ('layouts/mainproyek')

@section('title', 'Data Tender - ')
@section('metadeskription', 'Aplikasi Keterbukaan Data dan Informasi Seluruh Proses Pengadaan Barang dan Jasa di Lingkungan Pemerintah Kabupaten Bojonegoro.')
@section('metakeywords', 'siipp, open data kontrak, bojonegoro, bos, bojonegoro open system')
@section('thumbnail', 'thumbnail.png')

@section('container')
<section class="ftco-section ftco-no-pt bg-light">
  <br>
  <div class="container">
    <div class="row bg-white p-3">
      <div class="col">
        <h5 class="text-hijau"><b><i class="fas fa-filter"></i> Filter</b></h5>
        <hr>
        <form action="/proyek/tender" method="POST">
          @csrf
          <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="Tahun">Tahun Anggaran:</label>
                    <select class="form-control" id="sel1" name="tahun">
                      @if($tahun)
                      <option>{{$tahun}}</option>
                      @endif
                      @foreach($tahun_angs as $hasil)
                      <option>{{$hasil->tahun}}</option>
                      @endforeach
                    </select>
                </div>
            </div>    

            <div class="col-md-6">
              <div class="form-group">
                <label for="opd">Nama OPD</label>
                <select class="form-control text-capitalize" id="sel2" name="opd">
                  @if($satker)
                  <option  class="text-capitalize" value="{{$satker->kd_satker_sirup}}">{{strtolower($satker->nama)}}</option>
                  @else
                  <option  class="text-capitalize" value="1">-- Pilih salah satu --</option>
                  @endif
                  @foreach($satkers as $hasil)
                  <option  class="text-capitalize" value="{{$hasil->kd_satker_sirup}}">{{strtolower($hasil->nama)}}</option>
                  @endforeach
                  <option  class="text-capitalize" value="1">-- Semua --</option>
                </select>
              </div>
            </div>

            <div class="col-md-6">            
              <div class="form-group">
                  <label for="Kategori">Sumber Dana:</label>
                  <select class="form-control text-capitalize" id="sel3" name="sumber">
                  @if($sumber)
                  <option class="text-capitalize" value="{{$sumber}}">{{$sumber}}</option>
                  @else
                  <option class="text-capitalize" value="1">-- Pilih salah satu --</option>
                  @endif
                  @foreach($sumber_danas as $hasil)
                  <option class="text-capitalize" value="{{$hasil->nama}}">{{$hasil->nama}}</option>
                  @endforeach
                  <option class="text-capitalize" value="1">-- Semua --</option>
                  </select>
              </div>
            </div>

            <div class="col-md-6">  
              <div class="form-group">
                <label for="Kategori">Tahap Tender:</label>
                <select class="form-control" id="sel2" name="tahap" style="text-transform: capitalize;">
                  @if($tahap)
                  <option style="text-transform: capitalize;" value="{{$tahap->slug}}">{{$tahap->nama}}</option>
                  @else
                  <option value="">-- Pilih salah satu --</option>
                  @endif
                  @foreach($tahap_tenders as $hasil)
                  <option style="text-transform: capitalize;" value="{{$hasil->slug}}">{{$hasil->nama}}</option>
                  @endforeach
                  <option value="">-- Semua --</option>
                </select>
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label for="jenisPengadaan">Jenis Pekerjaan:</label>
                <select class="form-control text-capitalize" id="sel5" name="jenispengadaan">
                    @if($jenis)
                    <option value="{{$jenis->slug}}">{{$jenis->nama}}</option>
                    @else
                    <option value="1">-- Pilih salah satu --</option>
                    @endif
                    @foreach($jenis_pekerjaans as $hasil)
                    <option value="{{$hasil->slug}}">{{$hasil->nama}}</option>
                    @endforeach
                    <option value="1">-- Semua --</option>
                </select>
              </div>
            </div>
            <div class="col-md-6">
              <br>
              <div class="pt-3 float-right">
                <a href="/proyek" class="btn btns btn-default btn-lg " style="border: 1px solid gray"><i class="fas fa-sync-alt"></i> Reset</a>&nbsp;
                <button type="submit" class="btn btn-success ml-1"><span class="fas fa-filter"></span> Filter</button>
              </div>
            </div>
          </div>
        </form>
      </div>    
    </div>
    <br>
    
    <div class="row bg-white p-3">
      <div class="col">
        <h5 class="text-hijau"><b><i class="fas fa-briefcase"></i> Data Kontrak Tahun {{$tahun}}</b></h5>
        <hr>
        <div class="table table-responsive">
          <table class="table table-bordered" id="datatender">
            <thead class="bg-success">
              <tr>
                <th class="text-center text-white"></th>
                <th class="text-center text-white">Nama Paket</th>
                <th class="text-center text-white">Pagu<br class="m-0">(Rp.)</th>
                <th class="text-center text-white">Satuan Kerja</th>
                <th class="text-center text-white">Jenis Pekerjaan</th>
                <th class="text-center text-white" style="width: 10%">Skor</th>
              </tr>
            </thead>
            <tbody class="bg-white text-dark">
            </tbody>
          </table>
        </div>
      </div>    
    </div>
  </div>
</section>

@endsection

@section('script_tambahan')
<script type="text/javascript">
  function changefunction(id) {
    var idss = id.value;
    window.location.replace("/admin/rup/"+idss+"");  
  }
</script>

<script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>  
<script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script> 

<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js"></script>  
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>  
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>  
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>  
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.html5.min.js"></script>  


<script type="text/javascript">

  $(document).ready(function() {
    $('#datatender').DataTable({
      processing : false,
      serverSide : false,
      dom: 'Bfrtip',
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
        ],
      pageLength: 15,
      order: [[5, 'desc']],
      ajax : {
        url : "{{route('proyek.tender', ['tahun' => $tahun, 'satker' => $satkerid, 'jenispengadaan' => $jenisslug, 'tahap' => $tahapslug, 'sumber' => $sumberid])}}",
        type : 'GET'
      },
      columns: [
        {data:'id_rup',name:'id_rup'},
        {data:'nama_paket',name:'nama_paket'},
        {data:'pagu',name:'pagu'},
        {data:'satker',name:'satker'},
        {data:'kategori',name:'kategori'},
        {data:'skor',name:'skor'},
      ],
      columnDefs : [
      {
        targets : [2],
        render : function (data, type, row) {
          var btn = numberWithCommas(data);
          return btn;
        }
      },
      {
        targets : [5],
        render : function (data, type, row) {
          if (data >= 15) {
              var btn = "<center><a href=\"#\" class=\"badge badge-danger pt-2 pb-2 pl-3 pr-3\" style=\"border-radius:50px\">"+data+"</a></center>";
          }else if(data > 10 & data < 15) {
              var btn = "<center><a href=\"#\" class=\"badge badge-warning pt-2 pb-2 pl-3 pr-3\" style=\"border-radius:50px\">"+data+"</a></center>";
          }else if(data < 10) {
              var btn = "<center><a href=\"#\" class=\"badge badge-success pt-2 pb-2 pl-3 pr-3\" style=\"border-radius:50px\">"+data+"</a></center>";
          }else {
              var btn = "<center><a href=\"#\" class=\"badge badge-success pt-2 pb-2 pl-3 pr-3\" style=\"border-radius:50px\">0</a></center>";
          }
          return btn;
        }
      },
      {
        targets : [0],
        render : function (data, type, row) {
          var btn = "<center><i class=\"badge badge-success p-2\"><a href=\"/proyek/perencanaan/<?= $tahun ?>/"+data+"\" class=\"text-white\" target=\"_blank\"><i class=\"fas fa-arrow-right\"></i> Detail</i></a></center>";
          return btn;
        }
      }

      ],
    });

    function numberWithCommas(x) {
      return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    }

} );
</script>
@endsection