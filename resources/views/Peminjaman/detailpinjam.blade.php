@extends('template.template')
@section('breadcrumb')
    Detail Peminjaman
@endsection
@section('title_page')
    Detail Peminjaman
@endsection
@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header pb-0">
                        <div class="d-flex align-items-center">
                            <h4 class="mb-0">Detail Peminjaman</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('tambahkembalian') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @foreach ($peminjaman as $item)
                                <div class="row">
                                    <input type="hidden" name="id_siswa" value="{{ $item->id_siswa }}">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">ID Peminjaman</label>
                                            <input class="form-control" type="text" name="id_peminjaman"
                                                value="{{ $item->id_peminjaman }}" onfocus="focused(this)"
                                                onfocusout="defocused(this)" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">NISN</label>
                                            <input class="form-control" type="text" name="nisn"
                                                @foreach ($peminjaman as $nisnsiswapeminjam) value="{{ $nisnsiswapeminjam->nisn }}" @endforeach
                                                onfocus="focused(this)" onfocusout="defocused(this)" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">Nama Peminjam</label>
                                            <input class="form-control" type="text" name="nama_siswa"
                                                @foreach ($peminjaman as $nama_peminjam) value="{{ $nama_peminjam->nama_siswa }}" @endforeach
                                                onfocus="focused(this)" onfocusout="defocused(this)" readonly>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="example-date-input" class="form-control-label">Tanggal
                                                Peminjaman</label>
                                            <input class="form-control" type="date" name="tgl_peminjaman"
                                                value="{{ $item->tgl_peminjaman }}" onfocus="focused(this)"
                                                onfocusout="defocused(this)" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">Lama
                                                Peminjaman</label>
                                            <input class="form-control" type="text" name="lama_peminjaman"
                                                value="{{ $item->lama_peminjaman }}" onfocus="focused(this)"
                                                onfocusout="defocused(this)" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="example-date-input" class="form-control-label">Tanggal Jatuh
                                                Tempo</label>
                                            <input class="form-control" type="date" name="tgl_balik"
                                                value="{{ $item->tgl_balik }}" onfocus="focused(this)"
                                                onfocusout="defocused(this)" readonly>
                                        </div>
                                    </div>
                                    {{-- <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="example-date-input" class="form-control-label">Tanggal
                                                Pengembalian</label>
                                            <input class="form-control" type="date" name="tgl_kembali" value=""
                                                onfocus="focused(this)" onfocusout="defocused(this)">
                                        </div>
                                    </div> --}}
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">Denda</label>
                                            @foreach ($peminjaman as $hargadenda)
                                                <input class="form-control" type="text" name="denda"
                                                    value="<?php echo $hargadenda->hargadenda > 0 || $hargadenda->hargadenda != null ? $hargadenda->hargadenda : 0; ?>" onfocus="focused(this)"
                                                    onfocusout="defocused(this)" readonly>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div class="justify-content-center">
                                    <table
                                        style="float:none; margin-right: auto; margin-left: auto; width : 50%; border: 1px solid;">
                                        <thead>
                                            <tr style="border: 1px solid;">
                                                <th style="border: 1px solid; width : 35%;" class="text-center">Judul Buku
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody class="tbodybuku">
                                            {{-- @foreach ($peminjaman as $item) --}}
                                                <?php foreach(unserialize($peminjaman[0]->id_buku) as $idbuku) {   
                                                        echo '<tr><td class="text-center">';
                                                        $query = DB::table('tb_buku')->where('id_buku','=',$idbuku)->get();
                                                        foreach($query as $namabuku)
                                                        {
                                                            echo '- '.$namabuku->judul;
                                                        }
                                                        echo '</tr></td>';
                                                    ?>
                                                <?php } ?>
                                            {{-- @endforeach --}}
                                        </tbody>
                                    </table>
                                </div>
                                <hr class="my-4">
                                <span style="float: right">
                                    @if ($peminjaman[0]->status=="Belum Dikembalikan")
                                    <button type="submit" class="btn btn-success">Kembalikan Buku</button>
                                    @endif
                                    <a type="button" class="btn bg-gradient-danger"
                                        href="{{ route('peminjaman') }}">Kembali</a>
                                </span>
                            @endforeach
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<script>
    $(function() {

        function hitungDenda(value) {
            var price = 500;
            var firstDate = new Date($('input[name="tgl_balik"]').val());
            var secondDate = new Date($('input[name="tgl_kembali"]').val());
            var diffDays = Math.round(Math.round((secondDate.getTime() - firstDate.getTime()) * (price)));
            $('input[name="denda"]').val(diffDays)
        }

        $('input[name="tgl_balik"]').on('change', function() {
            hitungDenda();
        })

        $('input[name="tgl_kembali"]').on('change', function() {
            hitungDenda();
        })
    })
</script>
