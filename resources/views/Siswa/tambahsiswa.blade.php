@extends('template.template')
@section('breadcrumb')
  Tambah Siswa
@endsection
@section('title_page')
  Tambah Siswa
@endsection
@section('content')
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header pb-0">
              <div class="d-flex align-items-center">
                <h4 class="mb-0">Tambah Data Siswa</h4>
              </div>
        </div>
            <div class="card-body">
              <form action="{{ route('insertsiswa') }}" method="POST" enctype="multipart/form-data">
                @csrf
              <div class="row">
                {{-- <div class="col-md-6">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">ID Pengguna</label>
                    <input class="form-control" type="text" name="id_pengguna" value="{{ $randomnumber }}" onfocus="focused(this)" onfocusout="defocused(this)" readonly>
                  </div>
                </div> --}}
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">NISN</label>
                    <input class="form-control" type="text" name="nisn" value="" onfocus="focused(this)" onfocusout="defocused(this)">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Nama</label>
                    <input class="form-control" type="text" name="nama_siswa" value="" onfocus="focused(this)" onfocusout="defocused(this)">
                  </div>
                </div>
                {{-- <div class="col-md-6">
                  <div class="form-group">
                    <label for="example-password-input" class="form-control-label">Password</label>
                      <input class="form-control" type="password" name="password" value="password" id="myInput">
                      <input type="checkbox" onclick="myFunction()">Show Password
                            <script>
                                function myFunction() {
                                var x = document.getElementById("myInput");
                                if (x.type === "password") {
                                    x.type = "text";
                                } else {
                                    x.type = "password";
                                }
                                }
                            </script>
                  </div>
                  </div> --}}
                  {{-- <div class="col-md-6">
                    <div class="form-group">
                      <label for="exampleFormControlSelect1">Level</label>
                      <select class="form-control" name="level" id="exampleFormControlSelect1">
                        <option value="Admin">Admin</option>
                        <option value="Siswa">Siswa</option>
                      </select>
                    </div>
                  </div>
                --}}
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Tempat Lahir</label>
                    <input class="form-control" type="text" name="tempat_lahir" value="" onfocus="focused(this)" onfocusout="defocused(this)">
                  </div>
                </div>
                <div class="col-md-6">
                <div class="form-group">
                    <label for="example-date-input" class="form-control-label">Tanggal Lahir</label>
                    <input class="form-control" type="date" name="tanggal_lahir" value="" id="example-date-input">
                </div>
                </div>
                <div class="col-md-6">
                <div class="form-group">
                    <label for="example-date-input" class="form-control-label">Jenis Kelamin</label>
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="radio" name="jenis_kelamin" id="customRadio1" value="laki-laki">
                            <label class="form-check-label" for="customRadio1">Laki - Laki</label>                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="jenis_kelamin" id="customRadio2" value="perempuan">
                            <label class="form-check-label" for="customRadio2">Perempuan</label>
                        </div>
                </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Alamat</label>
                    <textarea class="form-control" type="text" name="alamat"  onfocus="focused(this)" onfocusout="defocused(this)"></textarea>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Kelas</label>
                    <input class="form-control" type="text" name="kelas" value="" onfocus="focused(this)" onfocusout="defocused(this)">
                  </div>
                </div>
              </div>
              <hr class="my-4">
              <span style="float: right">
                <button type="submit" class="btn bg-gradient-info">Tambah</button>
                <a type="button" class="btn bg-gradient-danger" href="{{route('siswa')}}">Kembali</a>
              </span>
            </form>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection