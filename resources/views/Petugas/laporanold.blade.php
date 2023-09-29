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
  Laporan
@endsection
@section('title_page')
  Laporan
@endsection
@section('content')
  <div class="row">
    <div class="col-12">
      {{-- <a class="btn btn-success" type="button" href="{{ route('tambahbuku') }}">
        <span class="btn-inner--icon"><i class="fas fa-plus"></i></span>
        <span class="btn-inner--text">Tambah Data Buku</span>
      </a> --}}
    </div>
  </div>
  <div class="row">
    <div class="col-12">
      <div class="card mb-4">
        <div class="row">
          <div class="col-12">
            <div class="card-header pb-0 text-white" style="background-color : #FFFFFF">
              <h4>Laporan</h4>
            </div>
          </div>
        </div> <br>
        <div class="card-body px-0 pt-0 pb-2">
          <div class="table-responsive px-4">
            <table id="table-laporan" class="display" style="width:100%">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama</th>
                  <th>Judul Buku</th>
                  <th>Penulis</th>
                  <th>Penerbit</th>
                  <th>Jumlah Buku</th>
                  <th>Tanggal Pinjam</th>
                  <th>Tanggal Tempo</th>
                  <th>Tanggal Kembali</th>
                  <th>Denda</th>
                  <th>Status</th>
                </tr>
              </thead>
              <tbody>
              @php
              $increment = 1;
              @endphp
            @foreach ($laporan as $item)
              <tr>
                <td>{{ $increment++ }}</td>
                <td>{{ $item->nama }}</td>
                <td>{{ $item->judul }}</td>
                <td>{{ $item->penulis }}</td>
                <td>{{ $item->penerbit }}</td>
                <td>{{ $item->jumlah }}</td>
                <td>{{ $item->tgl_peminjaman }}</td>
                <td>{{ $item->tgl_balik }}</td>
                <td>{{ $item->tgl_kembali }}</td>
                <td>{{ $item->denda }}</td>
                <td>{{ $item->status }}</td>
                {{-- <td>
                  <a href="{{ route('editbuku',["id" => $item->id_buku]) }}" class="btn btn-warning">Edit</a>
                  <a href="#" type="button" class="btn btn-danger btnhapus" idbuku="{{ $item->id_buku }}">Hapus</a>
                  </form> 
                </td> --}}
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
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css">
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
    <script>
      $(document).ready(function() {
        $('#table-laporan').DataTable({
        dom: 'Bfrtip',
                    buttons: [
                        'pdfHtml5'
      ]
        });
      });
    </script>
@endsection
