@extends('layouts.dashboard')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800 text-center">Data Barang Consumable</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            {{-- <button type="button" class="btn btn-primary mr-5" data-toggle="modal" data-target="#importExcel">
                IMPORT CSV
            </button> --}}

            <a href="{{url('/c.new')}}" type="button" class="btn btn-primary mr-5" >
                <strong>Tambahkan Barang Consumable Baru</strong>
            </a>

            <a href="{{url('/export.consum')}}" type="button" class="btn btn-success mr-5" >
                <strong>Export Excel</strong>
            </a>
            <!-- Import Excel -->
            <div class="modal fade" id="importExcel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <form method="post" action="{{ url('/consum')}}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Import File CSV</h5>
                            </div>
                            <div class="modal-body">
                                <label>Pilih file CSV</label>
                                <div class="form-group">
                                    <input type="file" name="file" required="required">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Import</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Kode Barang</th>
                            <th>Item Code</th>
                            <th>Nama Barang</th>
                            <th>Jumlah</th>
                            <th>Satuan</th>
                            <th>Kondisi</th>
                            <th>Note</th>
                            <th>Lokasi Penyimpanan</th>
                            <th>Update</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($consum as $c)
                            <tr>
                                <td>{{$c->id}}</td>
                                <td>{{$c->itemcode}}</td>
                                <td>{{$c->nama_barang}}</td>
                                <td>{{$c->jumlah}}</td>
                                <td>{{$c->satuan}}</td>
                                @if($c->jumlah <= 0)
                                <td>Stok Habis</td>
                                @elseif($c->jumlah > 0 && $c->jumlah <= 2)
                                    <td>Stok Sedikit</td>
                                @elseif($c->jumlah > 2 && $c->jumlah <= 5)
                                    <td>Stok Cukup</td>
                                @elseif($c->jumlah > 5)
                                    <td>Stok Banyak</td>
                                @endif
                                <td>{{$c->note}}</td>
                                <td>{{$c->lokasi}}</td>
                                <td>
                                    <div class="btn-toolbar">
                                        <a href="{{url('/c.tambah', $c->id)}}" type="button" class="btn btn-success btn-sm col-xs-2 margin-bottom" id="in">Masuk</a>
                                    </div>
                                    <div class="btn-toolbar">
                                        <a href="{{url('/c.kurang', $c->id)}}" type="button" class="btn btn-danger btn-sm" id="out">Keluar</a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
@endsection
