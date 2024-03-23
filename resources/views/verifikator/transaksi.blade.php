@extends('verifikator.partials.master')
@section('title', 'Detail Transaksi')
@section('content')

    <div class="container-fluid">
        <h3 class="text-black-50">Data Transaksi </h3>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        @if (session()->has('message'))
                            <div class="alert alert-info">
                                {{ session('message') }}
                            </div>
                        @endif
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">

                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr align="center" class="alert-dark">
                                    <th>No.</th>
                                    <th></th>
                                    <th>User</th>
                                    <th>Kode Transaksi</th>
                                    <th>Total</th>
                                    <th>Bukti Transaksi</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dataTransaksi as $item)
                                    <tr>
                                        <td align="center">{{ $loop->iteration }}</td>
                                        <td align="center"><a
                                                href="{{ route('verifikator.detail', $item->kode_transaksi) }}">Detail</a>
                                        </td>
                                        <td align="left">{{ $item->name }}</td>
                                        <td align="left">{{ $item->kode_transaksi }}</td>
                                        <td align="left"> {{ 'Rp ' . number_format($item->total, 0, ',', '.') }}</td>
                                        <td align="center">
                                            @if ($item->bukti == null)
                                                <img src="https://placehold.co/190x190?text=Belum+Ada+Transaksi"
                                                    alt="img" class="img-fluid">
                                            @else
                                                <a href="{{ asset($item->bukti) }}" target="_blank">
                                                    <img src="{{ asset($item->bukti) }}" alt=""
                                                        style="width:190px; height:190px;">
                                                </a>
                                            @endif
                                        </td>
                                        <td align="left">
                                            @if ($item->status == 'menunggu')
                                                <h2><span class="badge badge-secondary">Menunggu</span></h2>
                                            @elseif($item->status == 'proses')
                                                <h2><span class="badge badge-warning">Proses</span></h2>
                                            @else
                                                <h2><span class="badge badge-primary">selesai, terverifikasi</span></h2>
                                            @endif
                                        </td>
                                        @if ($item->status == 'menunggu')
                                            <form action="{{ route('verifikator.update', $item->id) }}" method="post">
                                                @csrf
                                                @method('PUT')

                                                <td>
                                                    <div class="dropdown">
                                                        <div class="input-group">
                                                            <select name="status" class="custom-select"
                                                                id="inputGroupSelect04">
                                                                <option value="menunggu"
                                                                    {{ $item->status == 'menunggu' ? 'selected' : '' }}>
                                                                    Menunggu
                                                                <option value="proses"
                                                                    {{ $item->status == 'proses' ? 'selected' : '' }}>
                                                                    Proses
                                                                </option>
                                                            </select>
                                                            <div class="input-group-append">
                                                                <button class="btn btn-outline-primary"
                                                                    type="submit">Update</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </form>
                                        @else
                                        @endif
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
