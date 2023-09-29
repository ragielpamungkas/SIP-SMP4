@extends('template.template')
@section('breadcrumb')
    Tambah Data Peminjaman
@endsection
@section('title_page')
    Tambah Data Peminjaman
@endsection
@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header pb-0">
                        <div class="d-flex align-items-center">
                            <h4 class="mb-0">Tambah Data Peminjaman</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('insertpinjam') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <input type="hidden" name="id_siswa">
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
                                            onfocus="focused(this)" onfocusout="defocused(this)" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Nama Peminjam</label>
                                        <input class="form-control" type="text" name="nama_siswa" value=""
                                            onfocus="focused(this)" onfocusout="defocused(this)" required readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Judul Buku</label>
                                        <select name="id_buku" id="" class="form-control select2">
                                            @foreach ($judbuk as $judulbuku)
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
                                            onfocus="focused(this)" onfocusout="defocused(this)" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Lama Peminjaman
                                            (hari)</label>
                                        <input class="form-control" type="text" name="lama_peminjaman" value=""
                                            onfocus="focused(this)" onfocusout="defocused(this)" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-date-input" class="form-control-label">Tanggal Jatuh
                                            Tempo</label>
                                        <input class="form-control" type="date" name="tgl_balik" value=""
                                            onfocus="focused(this)" onfocusout="defocused(this)" required>
                                    </div>
                                </div>
                            </div><br>
                            <input type="hidden" id="jmlhindex" value="0">
                            <div class="justify-content-center">
                                <table
                                    style="float:none; margin-right: auto; margin-left: auto; width : 50%; border: 1px solid;">
                                    <thead>
                                        <tr style="border: 1px solid;">
                                            <th style="border: 1px solid; width : 35%;" class="text-center">Judul Buku</th>
                                            <th style="border: 1px solid; width : 25%;" class="text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody class="tbodybuku">
                                    </tbody>
                                </table>
                            </div>
                            <hr class="my-4">
                            <span style="float: right">
                                <button type="submit" class="btn bg-gradient-info">Tambah</button>
                                <a type="button" class="btn bg-gradient-danger"
                                    href="{{ route('peminjaman') }}">Kembali</a>
                            </span>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    $(function() {
        $('input[name="nisn"]').on('keyup', function() {
            let valuethis = $(this).val();
            if (valuethis.length == 10) {
                $.ajax({
                    type: "GET",
                    data: {
                        nisn: valuethis
                    },
                    url: "{{ route('carinisn') }}",
                    dataType: "JSON",
                    success: function(res) {
                        if (res.resulttext == "Failed") {
                            $('input[name="nisn"]').val('') 
                            alert("Siswa Dengan NISN " +
                                valuethis +
                                " Sedang Meminjam Buku!")
                        } else if (res.resulttext == "Success") {
                            $.map(res.datasiswa, function(item) {
                                $('input[name="nama_siswa"]').val(item.nama_siswa);
                                $('input[name="id_siswa"]').val(item.id_siswa);
                            })
                        } else {
                             $('input[name="nama_siswa"]').val(''), $(
                                'input[name="id_siswa"]').val(''), $(
                                'input[name="nisn"]').val('')
                                alert("Data Siswa Tidak Ditemukan")
                        }
                    }
                })
            } else if (valuethis.length < 10) {
                $('input[name="nama_siswa"]').val('');
                $('input[name="id_siswa"]').val('');
            }
        })

        function hitungPerbandinganTanggal(value) {
            var oneDay = 24 * 60 * 60 * 1000;
            var firstDate = new Date($('input[name="tgl_peminjaman"]').val());
            var secondDate = new Date($('input[name="tgl_balik"]').val());
            var diffDays = Math.round(Math.round((secondDate.getTime() - firstDate.getTime()) / (oneDay)));
            $('input[name="lama_peminjaman"]').val(diffDays)
        }

        $('input[name="tgl_peminjaman"]').on('change', function() {
            hitungPerbandinganTanggal();
        })

        $('input[name="tgl_balik"]').on('change', function() {
            hitungPerbandinganTanggal();
        })
    })

    $(document).on('change', 'select[name="id_buku"]', function() {
        var idbuku = $('select[name="id_buku"] option:selected').attr('value');
        var namabuku = $('select[name="id_buku"] option:selected').text();
        var jmlhindex = $('#jmlhindex').val();
        var nisn = $('input[name="nisn"]').val();
        var idsiswa = $('input[name="id_siswa"]').val();

        if (nisn == "" || nisn == undefined) {
            alert('Harap Isikan NISN Terlebih Dahulu!')
        } else {
            $.ajax({
                type: "POST",
                url: "{{ route('cekpeminjaman') }}",
                dataType: "JSON",
                data: {
                    idsiswa,
                    idbuku
                },
                success: function(res) {
                    if (res.result == "Sukses") {
                        var index = parseInt(1) + parseInt(jmlhindex);

                        if (index == 3) {
                            alert("Tidak Bisa Lebih Dari 2")
                        } else {
                            $('#jmlhindex').val(index);
                            var htmlcode = `<tr style="border: 1px solid;" id="trbody` + index +
                                `">
                                <td style="border: 1px solid;" class="text-center"><input type="hidden" name="idbuku[]" value="` +
                                idbuku +
                                `"><br><input type="text" class="form-control" name="namabuku[]" value="` +
                                namabuku +
                                `"></td>
                                <td style="border: 1px solid;" class="text-center"><button type="button" class="btn btn-danger btn-md btnhapusbuku" index="` +
                                index + `">Hapus</button></td>
                            </tr>`
                            index++
                            $('.tbodybuku').append(htmlcode);
                        }
                    } else {
                        return alert(res.msg)
                    }
                }
            })
        }
    })

    $(document).on('click', '.btnhapusbuku', function() {
        var jmlhindex = $('#jmlhindex').val();
        var indextr = $(this).attr('index');
        var index = parseInt(jmlhindex) - parseInt(jmlhindex);
        $('#jmlhindex').val(index);

        $('#trbody' + indextr).remove();
    })
</script>
