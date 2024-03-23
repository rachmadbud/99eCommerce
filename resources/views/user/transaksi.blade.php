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
                <div class="col-lg-5">
                    <div class="intro-excerpt">
                        <h1>Transaksi</h1>
                    </div>
                </div>
                <div class="site-blocks-table">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="product-thumbnail">No</th>
                                <th class="product-thumbnail">-</th>
                                <th class="product-name">Kode Transaksi</th>
                                <th class="product-thumbnail">Total</th>
                                <th class="product-thumbnail">Bukti Transaksi</th>
                                <th class="product-thumbnail">aksi</th>
                                <th class="product-thumbnail">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dataTransaksi as $item)
                                <tr>
                                    <td class="product-thumbnail">{{ $loop->iteration }}</td>
                                    <td class="product-thumbnail"><a
                                            href="{{ route('detail', $item->kode_transaksi) }}">Detail</a></td>
                                    <td class="product-thumbnail">{{ $item->kode_transaksi }}</td>
                                    <td class="product-thumbnail">{{ $item->total }}</td>
                                    <td class="product-name">
                                        @if ($item->bukti == null)
                                            <img src="https://placehold.co/600x400?text=No+Image" alt="img"
                                                class="img-fluid">
                                        @else
                                            <img src="{{ asset($item->bukti) }}" alt="img" class="img-fluid">
                                        @endif
                                    </td>
                                    <form action="{{ route('updateImage', $item->id) }}" method="post"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <input type="text" name="idUser" value="{{ $item->id_user }}" hidden>
                                        <input type="text" name="kodeTransaksi" value="{{ $item->kode_transaksi }}"
                                            hidden>
                                        <input type="text" name="total" value="{{ $item->total }}" hidden>
                                        <input type="text" name="status" value="{{ $item->status }}" hidden>
                                        <td class="product-thumbnail">
                                            <div class="form-group">
                                                <input type="file" class="form-control-file" name="bukti"
                                                    id="bukti" required>
                                            </div>
                                            <button type="submit">Update Cart</button>
                                        </td>
                                    </form>
                                    <td class="product-name ">
                                        {{-- <h4 class="text-warning text-bold">{{ $item->status }}</h4> --}}
                                        @if ($item->status == 'menunggu')
                                            <!-- Jika status adalah 'menunggu' -->
                                            <h4 class="text-danger text-bold">Menunggu Verifikasi</h4>
                                        @elseif($item->status == 'proses')
                                            <!-- Jika status adalah 'proses' -->
                                            <h4 class="text-warning text-bold">Proses</h4>
                                        @else
                                            <!-- Jika status bukan 'menunggu' atau 'proses', dianggap 'selesai, terverifikasi' -->
                                            <h4 class="text-primary text-bold">Selesai, Barang Di kirim</h4>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="container">

                    <div class="row">
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-12">
                                    <label class="text-black h4" for="coupon">Payment</label>
                                    <p>Anda dapat bayar ke rekening yg tertera...</p>
                                </div>
                                <div class="col-md-8 mb-3 mb-md-0">
                                    <h3 class="d-flex align-items-center"><span class="me-1">
                                            <img src="{{ asset('assets/images/paypal.png') }}" alt="Image"
                                                class="img-fluid" style="width: 90px; height: 50px;"></span><span>
                                            : 123-456-7890 </span></h3>
                                    <br>
                                    <h3 class="d-flex align-items-center"><span class="me-1">
                                            <img src="{{ asset('assets/images/visa.png') }}" alt="Image"
                                                class="img-fluid" style="width: 90px; height: 50px;"></span><span>
                                            : 5678-9012-34. </span></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
