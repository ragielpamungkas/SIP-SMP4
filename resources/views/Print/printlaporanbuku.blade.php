<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
    integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous">
</script>

<div class="container">
    <table style="width : 100%">
        <tbody>
            <tr>
                <td style="width : 5%;"><img src="https://i.ibb.co/7p6KSZS/20505089-removebg-preview.png" alt="">
                </td>
                <td>
                    <div class="text-center">
                        <h2>SEKOLAH MENENGAH PERTAMA NEGERI 4 TUBAN</h2>
                        <h3>Jl. Prof. Dr. KH. Fatkhurrahman Kafrawi, Bogorejo, Kec. Merakurak, Kab. Tuban, Jawa Timur
                            (62351)</h3>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
    <hr>
    <div class="text-center">
        <h3>Laporan Data Buku</h3>
    </div>
    <br>
    {{-- <div class="row text-center">
        <div class="col-md-6">
            <strong>Dari Tanggal : </strong>
        </div>
        <div class="col-md-6">
            <strong>Sampai Tanggal : </strong>
        </div>
    </div> --}}

    <table class="table table-bordered table-hovered table-stripped" style="width : 100%">
        <thead>
            <tr>
                <th>JUDUL</th>
                <th>RAK</th>
                <th>KATEGORI</th>
                <th>PENULIS</th>
                <th>PENERBIT</th>
                <th>TAHUN</th>
                <th>STOK</th>
                <th>JUMLAH BUKU YANG DIPINJAM</th>
            </tr>
        </thead>
        <tbody>
            @php
                $index = 0;
                $arrindex = 0;
            @endphp

            @foreach ($databuku as $item)
                <tr>
                    <td>{{ $item->judul }}</td>
                    <td>{{ $item->rak }}</td>
                    <td>{{ $item->kategori }}</td>
                    <td>{{ $item->penulis }}</td>
                    <td>{{ $item->penerbit }}</td>
                    <td>{{ $item->tahun }}</td>
                    <td>{{ $item->jumlah }}</td>
                    <td><?php echo isset($jmlhpeminjamanarr[$index++]) ? $jmlhpeminjamanarr[$arrindex++] : '-'; ?></td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-3"></div>
        <div class="col-md-3"></div>
        <div class="col-md-3 text-right">
            <table class="mr-4">
                <tbody>
                    <tr>
                        <td class="text-center">Mengetahui <br><br><br><br></td>
                    </tr>
                    <tr>
                        <td class="text-center" rowspan="3"><strong><u>Abdul Somad, S.Sos</u></strong></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    </body>

    </html>
    <script>
        window.print()
    </script>
</div>
