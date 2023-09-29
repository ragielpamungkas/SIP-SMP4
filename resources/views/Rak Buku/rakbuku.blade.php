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
    Data Rak Buku
@endsection
@section('title_page')
    Data Rak Buku
@endsection
@section('content')
    <div class="container-fluid py-4">
        <div class="row mt-4">
            <div class="col-lg-6 mb-lg-0 mb-4">
                <div class="card ">
                    <div class="card-header pb-0 p-3">
                        <div class="d-flex justify-content-between">
                            <h4 class="mb-2">Tambah Data Rak Buku</h4>
                        </div>
                        <hr class="my-4">
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <form action="{{ route('insertrak') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Nama Rak Buku</label>
                                    <input class="form-control" type="text" name="rak" value=""
                                        onfocus="focused(this)" onfocusout="defocused(this)" required>
                                </div>
                                <button type="submit" class="btn btn-success">Tambah Data Rak Buku</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card mb-4">
                    <div class="row">
                        <div class="card-header" style="background-color : #FFFFF">
                            <h4>Data Rak Buku</h4>
                        </div>
                    </div> <br>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive px-4">
                            <table id="table-rakbuku" class="display" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Rak</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $increment = 1;
                                    @endphp
                                    @foreach ($rak as $item)
                                        <tr>
                                            <td>{{ $increment++ }}</td>
                                            <td>{{ $item->rak }}</td>
                                            <td>
                                                <div class="me-2">
                                                    <a href="{{ route('editrak',["id" => $item->id_rak ]) }}" class="btn btn-warning btnedit" 
                                                        idrak={{  $item->id_rak }} rak="{{ $item->rak }}"
                                                        data-bs-toggle="modal" data-bs-target="#exampleModalMessage"><i class="fa fa-edit"></i>
                                                    </a>
                                                    <div class="modal fade" id="exampleModalMessage" tabindex="-1"
                                                        aria-labelledby="exampleModalMessageTitle" aria-hidden="true"
                                                        style="display: none;">
                                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">
                                                                        Edit Data Rak
                                                                    </h5>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">×</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form action="{{ route('updaterak') }}" method="POST" enctype="multipart/form-data">
                                                                        @csrf
                                                                        <input type="hidden" name="id_rak"  id="id_rak" value(idrak)>
                                                                        <div class="form-group">
                                                                            <label for="example-date-input"
                                                                                class="col-form-label">Rak</label>
                                                                                <input type="text" class="form-control" name="rak" id="rak" value(rak)>
                                                                        </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="submit" class="btn bg-gradient-primary">
                                                                        Edit
                                                                    </button>
                                                                    <button type="button" class="btn bg-gradient-secondary"
                                                                        data-bs-dismiss="modal">
                                                                        Close
                                                                    </button>
                                                                </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <a href="#" type="button" class="btn btn-danger btnhapus"
                                                    idrak="{{ $item->id_rak }}"><i class="fa fa-trash"></i></a>
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
        </div>
    </div>
@endsection
@section('additional_js')
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#table-rakbuku').DataTable();
        });

        $('.btnhapus').on('click', function() {
            let idrak = $(this).attr('idrak');

            let textconfirm = confirm("Apakah Anda Ingin Menghapus Data Ini?");

            if (textconfirm == true) {
                $.ajax({
                    type: "POST",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "{{ route('hapusdatarak') }}",
                    data: {
                        idrak
                    },
                    dataType: "JSON",
                    success: function(result) {
                        if(result.result == "Success")
                        {
                            alert(result.msg);
                            window.location.reload();
                        }
                        else{
                            alert(result.msg);
                        }

                        // console.log(result)
                    }
                })
            } else {
                return alert("Gagal Menghapus !")
            }
        })

        $('.btnedit').on('click', function() {
        let idrak = $(this).attr('idrak');
        let rak = $(this).attr('rak');
        
        $('#id_rak').val(idrak);
        $('#rak').val(rak);

        // console.log(idkategori)

        })
    </script>
@endsection
