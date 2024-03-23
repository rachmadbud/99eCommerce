@extends('user.master')
@section('title', 'Detail Transaksi')
@section('content')

    <div class="untree_co-section before-footer-section">
        <div class="container">
            <div class="row mb-5">

                @if (session()->has('message'))
                    <div class="alert alert-success" role="alert">
                        {{ session('message') }}
                    </div>
                @endif
                <div class="col-lg-5">
                    <div class="intro-excerpt">
                        <h1>Detail Transaksi</h1>
                    </div>
                </div>
                <div class="site-blocks-table">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="product-name">Kode Transaksi</th>
                                <th class="product-thumbnail">Gambar</th>
                                <th class="product-name">Nama Barang</th>
                                <th class="product-name">Harga</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($stmtDetail as $item)
                                <tr>
                                    <td class="product-thumbnail">{{ $item->kode_transaksi }}</td>
                                    <td class="product-thumbnail">
                                        <img src="{{ asset($item->img) }}" alt="img" class="img-fluid">
                                    </td>
                                    <td class="product-thumbnail">{{ $item->nama }}</td>
                                    <td class="product-thumbnail">{{ 'Rp ' . number_format($item->harga, 0, ',', '.') }}
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
