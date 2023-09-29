@extends('template.template')
@section('breadcrumb')
    Tambah Data Pengembalian
@endsection
@section('title_page')
    Tambah Data Pengembalian
@endsection
@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header pb-0">
                        <div class="d-flex align-items-center">
                            <h4 class="mb-0">Tambah Data Pengembalian</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('insertpengembalian') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">ID Peminjaman</label>
                                        <input class="form-control" type="text" name="id_peminjaman"
                                            value="{{ $randomnumber }}" onfocus="focused(this)" onfocusout="defocused(this)"
                                            readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">NISN</label>
                                        <input class="form-control" type="text" name="nisn" value=""
                                            onfocus="focused(this)" onfocusout="defocused(this)">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Nama Peminjam</label>
                                        <input class="form-control" type="text" name="nama_siswa" value=""
                                            onfocus="focused(this)" onfocusout="defocused(this)">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Judul Buku</label>
                                    <select name="id_buku" id="" class="form-control">
                                      @foreach($judbuk as $judulbuku)
                                      <option value="{{ $judulbuku->id_buku }}">{{ $judulbuku->judul }}</option>
                                      @endforeach
                                    </select>
                                  </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-date-input" class="form-control-label">Tanggal
                                            Peminjaman</label>
                                        <input class="form-control" type="date" name="tgl_peminjaman" value=""
                                            onfocus="focused(this)" onfocusout="defocused(this)">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Lama Peminjaman</label>
                                        <input class="form-control" type="text" name="lama_peminjaman" value=""
                                            onfocus="focused(this)" onfocusout="defocused(this)" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-date-input" class="form-control-label">Tanggal Jatuh
                                            Tempo</label>
                                        <input class="form-control" type="date" name="tgl_balik" value=""
                                            onfocus="focused(this)" onfocusout="defocused(this)">
                                    </div>
                                </div>
                            </div>
                            <hr class="my-4">
                            <span style="float: right">
                                <button type="submit" class="btn bg-gradient-info">Tambah</button>
                                <a type="button" class="btn bg-gradient-danger" href="{{ route('databuku') }}">Kembali</a>
                            </span>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection