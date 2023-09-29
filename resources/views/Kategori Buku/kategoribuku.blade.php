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
    Data Kategori Buku
@endsection
@section('title_page')
    Data Kategori Buku
@endsection
@section('content')
    <!-- content Tambah Data Kategori Buku -->
    <div class="container-fluid py-4">
        <div class="row mt-4">
            <div class="col-lg-6 mb-lg-0 mb-4">
                <div class="card ">
                    <div class="card-header pb-0 p-3">
                        <div class="d-flex justify-content-between">
                            <h4 class="mb-2">Tambah Data Kategori Buku</h4>
                        </div>
                        <hr class="my-4">
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <form action="{{ route('insertkategori') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Nama Kategori Buku</label>
                                    <input class="form-control" type="text" name="kategori" value=""
                                        onfocus="focused(this)" onfocusout="defocused(this)" required>
                                </div>
                                <button type="submit" class="btn btn-success">Tambah Data Kategori Buku</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card mb-4">
                    <div class="row">
                        <div class="card-header" style="background-color : #FFFFF">
                            <h4>Data Kategori Buku</h4>
                        </div>
                    </div> <br>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive px-4">
                            <table id="table-kategoribuku" class="display" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kategori</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $increment = 1;
                                    @endphp
                                    @foreach ($kategori as $item)
                                        <tr>
                                            <td>{{ $increment++ }}</td>
                                            <td>{{ $item->kategori }}</td>
                                            <td>
                                                <div class="me-2">
                                                    <a href="{{ route('editkategori',["id" => $item->id_kategori ]) }}" class="btn btn-warning btnedit" 
                                                        idkategori={{  $item->id_kategori }} kategori="{{ $item->kategori }}"
                                                        data-bs-toggle="modal" data-bs-target="#exampleModalMessage"><i class="fa fa-edit"></i>
                                                    </a>
                                                    <div class="modal fade" id="exampleModalMessage" tabindex="-1"
                                                        aria-labelledby="exampleModalMessageTitle" aria-hidden="true"
                                                        style="display: none;">
                                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">
                                                                        Edit Data Kategori
                                                                    </h5>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">×</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form action="{{ route('updatekategori') }}" method="POST" enctype="multipart/form-data">
                                                                        @csrf
                                                                        <input type="hidden" name="id_kategori" id="id_kategori" value(idkategori)>
                                                                        <div class="form-group">
                                                                            <label for="example-date-input"
                                                                                class="col-form-label">Kategori</label>
                                                                            <input type="text" class="form-control" name="kategori" id="kategori" value(kategori)>
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
                                                    idkategori="{{ $item->id_kategori }}"><i class="fa fa-trash"></i></a>
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
            $('#table-kategoribuku').DataTable();
        });

        $('.btnhapus').on('click', function() {
            let idkategori = $(this).attr('idkategori');

            let textconfirm = confirm("Apakah Anda Ingin Menghapus Data Ini?");

            if (textconfirm == true) {
                $.ajax({
                    type: "POST",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "{{ route('hapusdatakategori') }}",
                    data: {
                        idkategori
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
        let idkategori = $(this).attr('idkategori');
        let kategori = $(this).attr('kategori');
        
        $('#id_kategori').val(idkategori);
        $('#kategori').val(kategori);

        // console.log(idkategori)

        })
            
    </script>
@endsection
