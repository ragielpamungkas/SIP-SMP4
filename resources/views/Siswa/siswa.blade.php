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
  Siswa
@endsection
@section('title_page')
  Siswa
@endsection
@if(session()->has('berhasil'))
  <div class="alert alert-success">
    {{ session()->get('berhasil')}}
  </div>
@endif
@section('content')
  <div class="row">
    <div class="col-12">
      <a class="btn btn-success" type="button" href="{{ route('tambahsiswa') }}">
        <span class="btn-inner--icon"><i class="fas fa-plus"></i></span>
        <span class="btn-inner--text">Tambah Data Siswa</span>
      </a>
    </div>
  </div>
  <div class="row">
    <div class="col-12">
      <div class="card mb-4">
        <div class="row">
          <div class="col-12">
            <div class="card-header pb-0 text-white" style="background-color : #FFFFFF">
              <h4>Tabel Data siswa</h4>
            </div>
          </div>
        </div> <br>
        <div class="card-body px-0 pt-0 pb-2">
          <div class="table-responsive px-4">
            <table id="table-siswa" class="display" style="width:100%">
              <thead>
                <tr>
                  <th>No</th>
                  <th>NISN</th>
                  <th>Nama</th>
                  <th>Tempat Lahir</th>
                  <th>Tanggal Lahir</th>
                  <th>Jenis Kelamin</th>
                  <th>Alamat</th>
                  <th>Kelas</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
               @php
                  $increment = 1;
                @endphp
                @foreach ($siswa as $item)
                  <tr>
                    <td>{{ $increment++ }}</td>
                    <td>{{ $item->nisn }}</td>
                    <td>{{ $item->nama_siswa }}</td>
                    <td>{{ $item->tempat_lahir }}</td>
                    <td>{{ $item->tanggal_lahir }}</td>
                    <td>{{ $item->jenis_kelamin }}</td>
                    <td>{{ $item->alamat }}</td>
                    <td>{{ $item->kelas }}</td>
                    <td>
                      <a href="{{ route('editsiswa',["id" => $item->id_siswa]) }}" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                      <a href="#" type="button" class="btn btn-danger btnhapus" idsiswa="{{ $item->id_siswa }}"><i class="fa fa-trash"></i></a>
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
        $('#table-siswa').DataTable()
      });

      $('.btnhapus').on('click',function(){
        let idsiswa = $(this).attr('idsiswa');

        let textconfirm = confirm("Apakah Anda Ingin Menghapus Data Ini?");

        if(textconfirm == true)
        {
          $.ajax({
            type : "POST",
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url : "{{ route('hapusdatasiswa') }}",
            data : {idsiswa},
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

<!-- Modal 
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>-->