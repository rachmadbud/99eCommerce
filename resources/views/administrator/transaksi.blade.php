@extends('layouts.master')
@section('title', 'Transaksi')
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
                                    <th>User</th>
                                    <th>Kode Transaksi</th>
                                    <th>Bukti Transaksi</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dataTransaksi as $item)
                                    <tr>
                                        <td align="center">1</td>
                                        <td align="left">{{ $item->name }}</td>
                                        <td align="left">{{ $item->kode_transaksi }}</td>
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
                                                <!-- Jika status adalah 'menunggu' -->
                                                <h2><span class="badge badge-secondary">Menunggu</span></h2>
                                            @elseif($item->status == 'proses')
                                                <!-- Jika status adalah 'proses' -->
                                                <h2><span class="badge badge-warning">Proses</span></h2>
                                            @else
                                                <!-- Jika status bukan 'menunggu' atau 'proses', dianggap 'selesai, terverifikasi' -->
                                                <h2><span class="badge badge-primary">Selesai, terverifikasi</span></h2>
                                            @endif
                                        </td>
                                        @if ($item->status == 'menunggu')
                                        @elseif($item->status == 'proses')
                                            <form action="{{ route('administrator.update', $item->id) }}" method="post">
                                                @csrf
                                                @method('PUT')

                                                <td>
                                                    <div class="dropdown">
                                                        <div class="input-group">
                                                            <select name="status" class="custom-select"
                                                                id="inputGroupSelect04">
                                                                <option value="proses"
                                                                    {{ $item->status == 'poses' ? 'selected' : '' }}>
                                                                    Proses
                                                                </option>
                                                                <option value="selesai"
                                                                    {{ $item->status == 'selesai' ? 'selected' : '' }}>
                                                                    Selesai,terverifikasi
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