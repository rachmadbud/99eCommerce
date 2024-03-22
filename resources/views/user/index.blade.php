@extends('user.master')
@section('title', 'Dashboard')
@section('content')

    <!-- Start Product Section -->
    <div class="product-section">
        <div class="container">
            <div class="row">
                @foreach ($barang as $item)
                    <div class="col-12 col-md-4 col-lg-3 mb-5 mb-md-0 my-2">
                        <button class="product-item" type="button" class="btn btn-primary" data-toggle="modal"
                            data-target="#barang{{ $item->id }}">
                            <img src="{{ asset($item->img) }}" class="img-fluid product-thumbnail">
                            <h3 class="product-title">{{ $item->nama }}</h3>
                            <strong class="product-price">{{ 'Rp ' . number_format($item->harga, 0, ',', '.') }}</strong>
                            <span class="icon-cross">
                                <img src="{{ asset('user/images/cross.svg') }}" class="img-fluid">
                            </span>
                        </button>
                    </div>


                    <!-- Modal -->
                    <div class="modal fade" id="barang{{ $item->id }}" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-body">

                                    @if (Auth::guest())
                                        <p class="text-muted">
                                            Untuk membeli harap login dahulu.. <a href="{{ route('login') }}"
                                                class="text-reset">klik
                                                disini untuk Login.. </a>.
                                        </p>
                                    @else
                                        <center>
                                            <h5 class="text-monospace">Add to Chart {{ $item->nama }}..?</h5>
                                        </center>
                                    @endif
                                </div>
                                @if (Auth::guest())
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>
                                @else
                                    <div class="modal-footer">
                                        <form action="{{ route('addToChart') }}" method="post">
                                            @csrf
                                            <input type="text" name="id_user" value="{{ Auth::user()->id }}" hidden>
                                            <input type="text" name="id_barang" value="{{ $item->id }}" hidden>
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Save</button>
                                        </form>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- End Product Section -->
@endsection
