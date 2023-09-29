@extends('template.template')
@section('breadcrumb')
  Edit Data Buku
@endsection
@section('title_page')
  Edit Data Buku
@endsection
@section('content')
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header pb-0">
              <div class="d-flex align-items-center">
                <h4 class="mb-0">Edit Data Buku</h4>
              </div>
        </div>
            <div class="card-body">
              <form action="{{ route('updatebuku') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @foreach ($databuku as $item)
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">ID Buku</label>
                    <input class="form-control" type="text" name="id_buku" value="{{ $item->id_buku }}" onfocus="focused(this)" onfocusout="defocused(this)" readonly>
                  </div>
                </div>
                <div class="col-md-6">
                <div class="form-group">
                  <label for="example-text-input" class="form-control-label">Rak</label>
                  <select name="id_rak" class="form-control" id="">
                    @foreach($raks as $rak){
                      <option {{ $rak->id_rak == $item->id_rak  ? "selected" : "" }} value={{ $rak->id_rak }}>{{ $rak->rak }}</option>
                    }
                    @endforeach
                    {{-- @foreach($raks as $rak){

                      <option value="{{ $rak->id_rak }}">{{ $rak->rak }}</option>
                    }
                    @endforeach --}}
                  </select>
                  {{-- <input class="form-control" type="text" name="id_rak" value="" onfocus="focused(this)" onfocusout="defocused(this)" readonly> --}}
                </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Kategori</label>
                    <select name="id_kategori" id="" class="form-control">
                      @foreach($categories as $categori){
                        <option {{ $categori->id_kategori == $item->id_kategori  ? "selected" : "" }} value={{ $categori->id_kategori }}>{{ $categori->kategori }}</option>
                      }
                      @endforeach
                    </select>
                    {{-- <input class="form-control" type="text" name="id_kategori" value="{{ $randomnumber }}" onfocus="focused(this)" onfocusout="defocused(this)" readonly> --}}
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Judul</label>
                    <input class="form-control" type="text" name="judul" value="{{ $item->judul }}" onfocus="focused(this)" onfocusout="defocused(this)">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Penulis</label>
                    <input class="form-control" type="text" name="penulis" value="{{ $item->penulis }}" onfocus="focused(this)" onfocusout="defocused(this)">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Penerbit</label>
                    <input class="form-control" type="text" name="penerbit" value="{{ $item->penerbit }}" onfocus="focused(this)" onfocusout="defocused(this)">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Tahun</label>
                    <input class="form-control" type="text" name="tahun" value="{{ $item->tahun }}" onfocus="focused(this)" onfocusout="defocused(this)">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Jumlah</label>
                    <input class="form-control" type="text" name="jumlah" value="{{ $item->jumlah }}" onfocus="focused(this)" onfocusout="defocused(this)">
                  </div>
                </div>
              </div>
                <hr class="my-4">
                    <span style="float: right">
                      <button type="submit" class="btn bg-gradient-info">Edit</button>
                      <a type="button" class="btn bg-gradient-danger" href="{{route('databuku')}}">Kembali</a>
                    </span>
                    @endforeach
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection