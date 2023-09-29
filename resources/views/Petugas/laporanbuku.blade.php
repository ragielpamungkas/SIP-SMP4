@extends('Petugas.template')
@section('additional_css')
  <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
  <style>
    .paginate_button.current {
      background-color: grey !important;
    }
  </style>
@endsection
@section('breadcrumb')
  Laporan Buku
@endsection
@section('title_page')
  Laporan Buku
@endsection