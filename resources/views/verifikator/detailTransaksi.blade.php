@extends('verifikator.partials.master')
@section('title', 'Detail Transaksi')
@section('content')

    <div class="container-fluid">
        <h3 class="text-black-50">Detail Transaksi </h3>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">

                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr align="center" class="alert-dark">
                                    <th>No.</th>
                                    <th>Kode Transaksi</th>
                                    <th>User</th>
                                    <th>Gambar</th>
                                    <th>Nama Barang</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($stmtDetail as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->kode_transaksi }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>
                                            <img src="{{ asset($item->img) }}" alt=""
                                                style="width:190px; height:190px;">
                                        </td>
                                        <td>{{ $item->nama }}</td>
                                        <td>{{ $item->harga }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>

    </div>
@endsection
