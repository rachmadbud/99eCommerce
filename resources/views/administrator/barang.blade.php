@extends('layouts.master')
@section('title', 'Dashboard')
@section('content')

    <div class="container-fluid">
        <h3 class="text-black-50">Master Data Barang </h3>

        <div class="row">
            <div class="col-7">
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
                                    <th>Nama</th>
                                    <th>Gambar</th>
                                    <th>Harga</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($barang as $item)
                                    <tr>
                                        <td align="center">{{ $loop->iteration }}</td>
                                        <td align="left">{{ $item->nama }}</td>
                                        <td align="left"><img src="{{ asset($item->img) }}" alt=""
                                                style="width:70px; height:70px;">
                                        </td>
                                        <td align="center">
                                            <br>
                                            <a href="">{{ $item->harga }}</a>
                                        </td>
                                        <td align="center">
                                            <button type="button" class="btn btn-danger" data-toggle="modal"
                                                data-target="#modalDelete{{ $item->id }}" title="Hapus">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <div class="modal fade" id="modalDelete{{ $item->id }}">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h6 class="modal-title">Hapus Data
                                                    </h6>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <center>
                                                        <span>Yakin Hapus</span>
                                                        <h4 class="text-danger"> {{ $item->nama }}...?
                                                        </h4>
                                                    </center>
                                                    <div class="modal-footer justify-content-between">
                                                        <a href="" class="btn btn-outline-secondary"
                                                            data-dismiss="modal">Close</a>
                                                        <a href="{{ route('administrator.hapusBarang', $item->id) }}"
                                                            class="btn btn-danger">Delete
                                                        </a>
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                            <!-- /.modal-content -->
                                        </div>
                                        <!-- /.modal-dialog -->
                                    </div>
                                @endforeach
                            </tbody>
                        </table>

                    </div>

                    <!-- /.card-body -->
                </div>
            </div>
            <div class="col-md-5">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3>Tambah Data </h3>
                        <!-- /.card-tools -->
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                        <div class="table-responsive mailbox-messages" style="height: 320px;">
                            <div class="card-body">
                                <form action="{{ route('administrator.inputBarang') }}" method="post"
                                    enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    @if ($errors->any())
                                        <div class="alert alert-danger" role="alert">
                                            Anda Harus mengisi data dengan lengkap
                                        </div>
                                    @endif
                                    <div class="card-body">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend center">
                                                <span class="input-group-text"><span
                                                        class="text-danger font-weight-bold">&ast;</span>Nama Barang</span>
                                            </div>
                                            <input type="text" name="nama" value="{{ old('nama') }}"
                                                class="form-control {{ $errors->has('nama') ? ' is-invalid' : '' }}"
                                                placeholder="Contoh: Cerrier Ospre 65L">
                                            @if ($errors->has('nama'))
                                                <div id="validationServer05Feedback" class="invalid-feedback">
                                                    {{ $errors->first('nama') }}
                                                </div>
                                            @endif
                                        </div>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend center">
                                                <span class="input-group-text"><span
                                                        class="text-danger font-weight-bold">&ast;</span>Harga</span>
                                            </div>
                                            <input type="number" name="harga" value="{{ old('harga') }}"
                                                class="form-control {{ $errors->has('harga') ? ' is-invalid' : '' }}"
                                                placeholder="Contoh: 123000">
                                            @if ($errors->has('harga'))
                                                <div id="validationServer05Feedback" class="invalid-feedback">
                                                    {{ $errors->first('harga') }}
                                                </div>
                                            @endif
                                        </div>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend center">
                                                <span class="input-group-text"><span
                                                        class="text-danger font-weight-bold">&ast;</span> File Gambar</span>
                                            </div>
                                            <input type="file" name="file" value="{{ old('file') }}"
                                                class="form-control {{ $errors->has('file') ? ' is-invalid' : '' }}"
                                                placeholder="file . . .">
                                            @if ($errors->has('file'))
                                                <div id="validationServer05Feedback" class="invalid-feedback">
                                                    {{ $errors->first('file') }}
                                                </div>
                                            @endif
                                        </div>
                                        <div class="modal-footer justify-content">
                                            <button type="reset" value="reset" class="btn btn-default"
                                                data-dismiss="modal">Reset</button>
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <!-- /.table -->
                        </div>
                        <!-- /.mail-box-messages -->
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>

    </div>
@endsection
