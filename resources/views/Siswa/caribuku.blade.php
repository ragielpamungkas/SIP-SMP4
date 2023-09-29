@extends('Siswa.template')
@section('additional_css')
  <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
  <style>
    .paginate_button.current {
      background-color: grey !important;
    }
  </style>
@endsection
@section('breadcrumb')
  Cari Buku
@endsection
@section('title_page')
  Cari Buku
@endsection
@section('content')
  <div class="row">
    <div class="col-12">
      <div class="card mb-4">
        <div class="row">
          <div class="col-12">
            <div class="card-header pb-0 text-white" style="background-color : #FFFFFF">
              <h4>Tabel Cari Buku</h4>
            </div>
          </div>
        </div> <br>
        <div class="card-body px-0 pt-0 pb-2">
          <div class="table-responsive px-4">
            <table id="table-caribuku" class="display" style="width:100%">
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
                  <th>Jumlah Peminjaman</th>
                </tr>
              </thead>
              <tbody>
                @php
                // $index = 0;
                // $arrindex = 0;
                $increment = 1;
            @endphp
            @foreach ($caribuku as $item)
                <tr>
                    <td>{{ $increment++ }}</td>
                    @foreach ($item->rak as $obj)
                        <td>{{ $obj->rak }}</td>
                    @endforeach
                    @foreach ($item->kategori as $arr)
                        <td>{{ $arr->kategori }}</td>
                    @endforeach
                    <td>{{ $item->judul }}</td>
                    <td>{{ $item->penulis }}</td>
                    <td>{{ $item->penerbit }}</td>
                    <td>{{ $item->tahun }}</td>
                    <td>{{ $item->jumlah }}</td>
                    <td><?php echo isset($item->jumlahpeminjam) ? $item->jumlahpeminjam : "-" ?></td>          
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
        $('#table-caribuku').DataTable();
      });
    </script>
@endsection
