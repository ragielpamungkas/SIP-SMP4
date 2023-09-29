@extends('template.template')
@section('additional_css')
  <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
  <style>
    .paginate_button.current {
      background-color: grey !important;
    }
  </style>
@endsection
@section('breadcrumb')
  Peminjaman
@endsection
@section('title_page')
  Peminjaman
@endsection
@section('content')
  <div class="row">
    <div class="col-12">
      <a class="btn btn-success" type="button" href="{{ route('tambahpinjam') }}">
        <span class="btn-inner--icon"><i class="fas fa-plus"></i></span>
        <span class="btn-inner--text">Tambah Peminjaman</span>
      </a>
    </div>
  </div> <br>
  <div class="row">
    <div class="col-12">
      <div class="card mb-4">
        <div class="row">
          <div class="col-9">
            <div class="card-header pb-0 text-white" style="background-color : #FFFFFF">
              <h6>Tabel Data Peminjaman</h6>
            </div>
          </div>
        </div>
        <div class="card-body px-0 pt-0 pb-2">
          <div class="table-responsive px-4">
            <table id="table-peminjaman" class="display" style="width:100%">
              <thead>
                <tr>
                  <th>No</th>
                  <th>NISN</th>
                  <th>Nama</th>
                  <th>Judul Buku</th>
                  <th>Status</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                @php
                  $increment = 1;
                @endphp
                @foreach ($alldatabuku as $item)
                  <tr>
                    <td>{{ $increment++ }}</td>
                    <td>{{ $item->nisn }}</td>
                    <td>{{ $item->nama_siswa }}</td>
                    <td>
                      <?php foreach(unserialize($item->id_buku) as $id_buku) {
                        $query = DB::select("SELECT tb_buku.judul FROM tb_buku WHERE id_buku = '".$id_buku."'");

                        foreach($query as $buku)
                        {
                          echo $buku->judul."<br>";
                        }
                       }?>
                    </td>
                    <td>{{ $item->status }}</td>
                    <td>
                      <a href="{{ route('detailpinjam',["id" => $item->id_peminjaman]) }}" class="btn btn-warning"><i class="fa fa-edit"></i>Detail Peminjaman</a>
                      <a href="#" type="button" class="btn btn-danger btnhapus" idpeminjaman="{{ $item->id_peminjaman }}"><i class="fa fa-trash"></i></a>
                      </form> 
                    </td>
                  </tr>
                  @endforeach
              </tbody>
            </table>
        </div>
      </div>
    </div>
  </div>
@endsection
@section('additional_js')
  <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script>
      $(document).ready(function() {
        $('#table-peminjaman').DataTable();
      });

      $('.btnhapus').on('click',function(){
        let idpeminjaman = $(this).attr('idpeminjaman');

        let textconfirm = confirm("Apakah Anda Ingin Menghapus Data Ini?");

        if(textconfirm == true)
        {
          $.ajax({
            type : "POST",
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url : "{{ route('hapusdatapinjam') }}",
            data : {idpeminjaman},
            dataType : "JSON",
            success : function(result)
            {
              location.reload();
            }
          })
        }
        else
        {
          return alert("Gagal Menghapus !")
        }
      })
    </script>
@endsection
