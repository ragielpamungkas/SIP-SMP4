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
  Data Buku
@endsection
@section('title_page')
  Data Buku
@endsection
@section('content')
  <div class="row">
    <div class="col-12">
      <a class="btn btn-success" type="button" href="{{ route('tambahbuku') }}">
        <span class="btn-inner--icon"><i class="fas fa-plus"></i></span>
        <span class="btn-inner--text">Tambah Data Buku</span>
      </a>
    </div>
  </div>
  <div class="row">
    <div class="col-12">
      <div class="card mb-4">
        <div class="row">
          <div class="col-12">
            <div class="card-header pb-0 text-white" style="background-color : #FFFFFF">
              <h4>Tabel Data Buku</h4>
            </div>
          </div>
        </div> <br>
        <div class="card-body px-0 pt-0 pb-2">
          <div class="table-responsive px-4">
            <table id="table-databuku" class="display" style="width:100%">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Rak</th>
                  <th>Kategori</th>
                  <th>Judul</th>
                  <th>Penulis</th>
                  <th>Penerbit</th>
                  <th>Tahun</th>
                  <th>Jumlah</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
              @php
              $increment = 1;
              @endphp
            @foreach ($databuku as $item)
              <tr>
                <td>{{ $increment++ }}</td>
                <td>{{ $item->rak }}</td>
                <td>{{ $item->kategori }}</td>
                <td>{{ $item->judul }}</td>
                <td>{{ $item->penulis }}</td>
                <td>{{ $item->penerbit }}</td>
                <td>{{ $item->tahun }}</td>
                <td>{{ $item->jumlah }}</td>
                <td>
                  <a href="{{ route('editbuku',["id" => $item->id_buku]) }}" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                  <a href="#" type="button" class="btn btn-danger btnhapus" idbuku="{{ $item->id_buku }}"><i class="fa fa-trash"></i></a>
                  </form> 
                </td>
              </tr>
            @endforeach
              <tbody>
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
        $('#table-databuku').DataTable();
      });

      $('.btnhapus').on('click',function(){
        let idbuku = $(this).attr('idbuku');

        let textconfirm = confirm("Apakah Anda Ingin Menghapus Data Ini?");

        if(textconfirm == true)
        {
          $.ajax({
            type : "POST",
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url : "{{ route('hapusdatabuku') }}",
            data : {idbuku},
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
