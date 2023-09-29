@extends('template.template')
@section('breadcrumb')
    Edit Data Pengguna
@endsection
@section('title_page')
    Edit Data Pengguna
@endsection
@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header pb-0">
                        <div class="d-flex align-items-center">
                            <h4 class="mb-0">Edit Data Pengguna</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('updatedata') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @foreach ($pengguna as $item)
                                <div class="row">
                                    {{-- <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">ID Pengguna</label>
                                            <input class="form-control" type="text" name="id_pengguna"
                                                value="{{ $item->id_pengguna }}" onfocus="focused(this)"
                                                onfocusout="defocused(this)" readonly>
                                        </div>
                                    </div> --}}
                                    <input type="hidden" name="id_pengguna" value="{{ $item->id_pengguna }}">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">NIP</label>
                                            <input class="form-control" type="text" name="nip"
                                                value="{{ $item->nip }}" onfocus="focused(this)"
                                                onfocusout="defocused(this)">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">Email address</label>
                                            <input class="form-control" type="email" name="email"
                                                value="{{ $item->email }}" onfocus="focused(this)"
                                                onfocusout="defocused(this)">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">Level</label>
                                            <select class="form-control" name="level" id="exampleFormControlSelect1">
                                                <option {{ $item->level == "admin" ? "selected" : "" }} value="admin">Admin</option>
                                                <option {{ $item->level == "kepala perpustakaan" ? "selected" : "" }} value="kepala perpustakaan">Kepala Perpustakaan</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">Nama</label>
                                            <input class="form-control" type="text" name="nama"
                                                value="{{ $item->nama }}" onfocus="focused(this)"
                                                onfocusout="defocused(this)">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">Tempat Lahir</label>
                                            <input class="form-control" type="text" name="tempat_lahir"
                                                value="{{ $item->tempat_lahir }}" onfocus="focused(this)"
                                                onfocusout="defocused(this)">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="example-date-input" class="form-control-label">Tanggal Lahir</label>
                                            <input class="form-control" type="date" name="tanggal_lahir"
                                                value="{{ $item->tanggal_lahir }}" id="example-date-input">
                                        </div>
                                    </div>
                                    <?php if($item->jenis_kelamin == "Laki-Laki")
                                    {?>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="example-date-input" class="form-control-label">Jenis Kelamin</label>
                                            <div class="form-check mb-3">
                                                <input class="form-check-input" type="radio" name="jenis_kelamin"
                                                    id="customRadio1" value="Laki-Laki" checked>
                                                <label class="form-check-label" for="customRadio1">Laki - Laki</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="jenis_kelamin"
                                                    id="customRadio2" value="Perempuan">
                                                <label class="form-check-label" for="customRadio2">Perempuan</label>
                                            </div>
                                        </div>
                                    </div>
                                    <?php } else { ?>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="example-date-input" class="form-control-label">Jenis Kelamin</label>
                                            <div class="form-check mb-3">
                                                <input class="form-check-input" type="radio" name="jenis_kelamin"
                                                    id="customRadio1" value="Laki-Laki">
                                                <label class="form-check-label" for="customRadio1">Laki - Laki</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="jenis_kelamin"
                                                    id="customRadio2" value="Perempuan" checked>
                                                <label class="form-check-label" for="customRadio2">Perempuan</label>
                                            </div>
                                        </div>
                                    </div>
                                    <?php } ?>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">Alamat</label>
                                            <textarea class="form-control" type="text" name="alamat" onfocus="focused(this)" onfocusout="defocused(this)">{{ $item->alamat }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <button type="button" class="btn btn-primary btn-md btngantipassword"
                                            data-toggle="modal" data-target="#exampleModal" style="float:left;">Ganti
                                            Password</button>
                                    </div>
                                </div>
                                <hr class="my-4">
                                <span style="float: right">
                                    <button type="submit" class="btn bg-gradient-info">Edit</button>
                                    <a type="button" class="btn bg-gradient-danger"
                                        href="{{ route('pengguna') }}">Kembali</a>
                                </span>
                            @endforeach
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ganti Password Baru</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('gantipassword') }}" method="POST">
                        @csrf
                        @foreach ($pengguna as $item)
                            <input type="hidden" name="id" value="{{ $item->id }}">
                        @endforeach
                        <div class="form-group">
                            <label for="">Password Baru</label>
                            <input type="text" name="password" class="form-control">
                        </div>
                        <div class="text-right">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
