@extends('Petugas.template')
@section('breadcrumb')
    Laporan
@endsection
@section('title_page')
    Laporan
@endsection
@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header pb-0">
                        <div class="d-flex align-items-center">
                            <h4 class="mb-0">LAPORAN SIP SMPN 4 TUBAN</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="col-md-12 col-sm justify-content-center">
                            <table class="table table-bordered table-hovered" style="width : 100%;">
                                <tbody>
                                    <tr>
                                        <td class=""><strong>Laporan Siswa</strong></td>
                                        <td class=""><a href="{{ route('printlaporansiswa') }}" type="button"
                                                class="btn btn-danger"><i class="fa fa-print"></i></a></td>
                                    </tr>
                                    <tr>
                                        <td class=""><strong>Laporan Buku</strong></td>
                                        <td class=""><a href="{{ route('printlaporanbuku') }}" type="button"
                                                class="btn btn-danger"><i class="fa fa-print"></i></a></td>
                                    </tr>
                                    <tr>
                                        <td class=""><strong>Laporan Peminjaman</strong></td>
                                        <td class=""><a type="button" class="btn btn-danger btnlaporanpeminjaman"
                                                data-toggle="modal" data-target="#staticBackdrop"><i
                                                    class="fa fa-print"></i></a></td>
                                    </tr>
                                    <tr>
                                        <td class=""><strong>Laporan Pengembalian</strong></td>
                                        <td class=""><a href="javascript:void(0)" type="button"
                                                class="btn btn-danger btnlaporanpengembalian" data-toggle="modal"
                                                data-target="#staticBackdrop"><i class="fa fa-print"></i></a></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="POST" id="frmlaporan">
                        <div class="row justify-content-center">
                            <div class="col-md-12">
                                <input type="month" class="form-control" name="bulanlaporan">
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-print"></i>&nbsp;Print</button>
                </div>
                </form>
            </div>
        </div>
    </div>
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    $(function() {
        $('.btnlaporanpeminjaman').on('click', function() {
            $('.modal-title').text('Laporan Peminjaman');

            let base_url = window.location.origin;

            $('#frmlaporan').attr('action',base_url + '/printlaporanpeminjaman');
        })

        $('.btnlaporanpengembalian').on('click', function() {
            $('.modal-title').text('Laporan Pengembalian');

            let base_url = window.location.origin;

            $('#frmlaporan').attr('action',base_url + '/printlaporanpengembalian');
        })
    })
</script>
