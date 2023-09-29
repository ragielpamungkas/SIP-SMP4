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
    Pengembalian
@endsection
@section('title_page')
    Pengembalian
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="row">
                    <div class="col-12">
                        <div class="card-header pb-0 text-white" style="background-color : #FFFFFF">
                            <h6>Tabel Data Pengembalian</h6>
                        </div>
                    </div>
                </div> <br>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive px-4">
                        <table id="table-pengembalian" class="display" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>NISN</th>
                                    <th>Nama</th>
                                    <th>Judul Buku</th>
                                    <th>Tanggal Peminjaman</th>
                                    <th>Jatuh Tempo</th>
                                    <th>Status</th>
                                    <th>Tanggal Kembali</th>
                                    <th>Denda</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $increment = 1;
                                @endphp
                                @foreach ($pengembalian as $item)
                                    <tr>
                                        <td>{{ $increment++ }}</td>
                                        <td>{{ $item->nisn }}</td>
                                        <td>{{ $item->nama_siswa }}</td>
                                        <td>
                                            <?php
                                            foreach (unserialize($item->id_buku) as $idbuku) {
                                                $getdatabuku = DB::table('tb_buku')
                                                    ->where('id_buku', '=', $idbuku)
                                                    ->get();
                                            
                                                foreach ($getdatabuku as $namabuku) {
                                                    echo "<ul><li>&nbsp;".$namabuku->judul."<br></ul></li>";
                                                }
                                            }
                                            ?>
                                        </td>
                                        <td>{{ $item->tgl_peminjaman }}</td>
                                        <td>{{ $item->tgl_balik }}</td>
                                        <td>{{ $item->status }}</td>
                                        <td>{{ $item->tgl_kembali }}</td>
                                        <td>{{ $item->denda }}</td>
                                        <td>
                                            <a href="#" type="button" class="btn btn-danger btnhapus"
                                                idpeminjaman="#"><i class="fa fa-trash"></i></a>
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
                $('#table-pengembalian').DataTable();
            });
        </script>

        <script type="text/javascript">
            function CallMe() {
                var oneDayFine = 5;
                var dateVariable = document.getElementById('txtDueDate').value;
                var dueDate = new Date("dateVariable");
                var currentDate = new Date(); //Get the current Date
                var differenceinDays = Math.Abs(currentDate.getTime() - dueDate.getTime());
                if (differenceinDays > 0) {
                    var totalFine = oneDayFine * differenceinDays;
                    document.getElementById('txtFine').value = totalFine;
                } else {
                    window.alert('No Fine');
                }
            }
        </script>
    @endsection
