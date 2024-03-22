@extends('verifikator.partials.master')
@section('title', 'Dashboard')
@section('content')

    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    Selamat Datang di <span class="text-bold">{{ config('app.name') }}</span>
                </h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <!-- Bar Chart -->
                        <div class="card">
                            <div class="card-body">
                                <!-- small box -->
                                <div class="small-box bg-warning">
                                    <div class="inner">
                                        <h3></h3>
                                        <p>Hak Akses Anda <span class="text-bold">Verifikator</span></p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-person-add"></i>
                                    </div>
                                    <a href="" class="small-box-footer"><i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                                <!-- ./col -->
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <!-- Bar Chart -->
                        <div class="card bg-gradient-success">
                            <dotlottie-player background="#FFFFFF" direction="1"
                                id="animation_queue-users-search_fe5e3994-1183-11ee-a7c2-fb9df86a6a60" speed="1"
                                mode="normal"
                                src="https://assets-v2.lottiefiles.com/a/fe5e3994-1183-11ee-a7c2-fb9df86a6a60/14pEvOdxXu.lottie"
                                loop autoplay style="width: 600px; height: 350px;"></dotlottie-player>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('script')
    <script src="{{ asset('') }}/assets/dist/js/pages/dashboard.js"></script>
    <script src="https://unpkg.com/@dotlottie/player-component@latest/dist/dotlottie-player.mjs" type="module"></script>
@endpush
