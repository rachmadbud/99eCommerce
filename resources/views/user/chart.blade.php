@extends('user.master')
@section('title', 'Dashboard')
@section('content')

    <div class="untree_co-section before-footer-section">
        <div class="container">
            <div class="row mb-5">

                @if (session()->has('message'))
                    <div class="alert alert-success" role="alert">
                        {{ session('message') }}
                    </div>
                @endif
                <form action="{{ route('cekout') }}" class="col-md-12" method="post">
                    @csrf
                    <div class="col-lg-5">
                        <div class="intro-excerpt">
                            <h1>Cart</h1>
                        </div>
                    </div>
                    <div class="site-blocks-table">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="product-thumbnail">Image</th>
                                    <th class="product-name">Product</th>
                                    <th class="product-price">Price</th>
                                    <th class="product-remove">Remove</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($stmtDataChart as $item)
                                    <tr>
                                        <td class="product-thumbnail">
                                            <img src="{{ asset($item->img) }}" alt="Image" class="img-fluid">
                                        </td>
                                        <td class="product-name">
                                            <h2 class="h5 text-black">{{ $item->nama }}</h2>
                                            <input type="text" name="barang[]" value="{{ $item->id_barang }}" hidden>
                                        </td>
                                        <td>{{ 'Rp ' . number_format($item->harga, 0, ',', '.') }}</td>
                                        <td><a href="{{ route('deleteItemChart', $item->id) }}"
                                                class="btn btn-black btn-sm">X</a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
            </div>

            <div class="row">
                <div class="col-md-6">

                </div>
                <div class="col-md-6 pl-5">
                    <div class="row justify-content-end">
                        <div class="col-md-7">
                            <div class="row">
                                <div class="col-md-12 text-right border-bottom mb-5">
                                    <h3 class="text-black h4 text-uppercase">Grand Total</h3>
                                </div>
                            </div>
                            <div class="row mb-5">
                                <div class="col-md-6">
                                    <span class="text-black">Total</span>
                                </div>
                                <div class="col-md-6 text-right">
                                    <strong class="text-black">
                                        {{ 'Rp ' . number_format($stmtTotal, 0, ',', '.') }}</strong>
                                    <input type="text" name="total" value="{{ $stmtTotal }}" hidden>
                                </div>
                            </div>

                            @if ($stmtDataChart->isEmpty())
                            @else
                                <div class="row">
                                    <div class="col-md-12">
                                        <button class="btn btn-black btn-lg py-3 btn-block"
                                            onclick="window.location='checkout.html'">Proceed To Checkout</button>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
@endsection
