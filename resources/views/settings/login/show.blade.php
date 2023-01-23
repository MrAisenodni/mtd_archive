@extends('layouts.main')

@section('title', $menu->title)

@section('styles')
    <link href="{{ asset('/plugins/select2/css/select2.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('/plugins/select2/css/select2-bootstrap4.css') }}" rel="stylesheet" />
@endsection

@section('content')
    <main class="page-content">
        <input type="hidden" value="{{ $menu->url }}" id="url">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">{{ $menu->menu->title }}</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="/"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $menu->title }}</li>
                    </ol>
                </nav>
            </div>
            @if ($access->add == 1)
            <div class="ms-auto">
                <div class="btn-group">
                    <a href="{{ $menu->url }}/create" class="btn btn-primary">Tambah</a>
                </div>
            </div>
            @endif
        </div>
        <!--end breadcrumb-->
        <h6 class="mb-0 text-uppercase">Detail {{ $menu->title }}</h6>
        <hr/>
        <div class="row">
            @if (session('status'))
                <div class="col-12">
                    <div class="alert border-0 bg-light-success alert-dismissible fade show py-2">
                        <div class="d-flex align-items-center">
                            <div class="fs-3 text-success"><i class="bi bi-check-circle-fill"></i>
                            </div>
                            <div class="ms-3">
                                <div class="text-success">{{ session('status') }}</div>
                            </div>
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
            @endif 
            @if (session('error'))
                <div class="col-12">
                    <div class="alert border-0 bg-light-danger alert-dismissible fade show py-2">
                        <div class="d-flex align-items-center">
                            <div class="fs-3 text-danger"><i class="bi bi-check-circle-fill"></i>
                            </div>
                            <div class="ms-3">
                                <div class="text-danger">{{ session('error') }}</div>
                            </div>
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
            @endif 
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ $menu->url }}/{{ $detail->id }}" method="POST">
                            @method('put')
                            @csrf
                            <div class="row mb-2">
                                <div class="col-6">
                                    <label class="form-label" for="user">Nama Lengkap</label>
                                    <input type="user" class="form-control" id="user" name="user" value="{{ old('user', $detail->user->full_name) }}" disabled>
                                </div>
                                <div class="col-6">
                                    <label class="form-label" for="username">Nama Pengguna</label>
                                    <input type="text" class="form-control" id="username" name="username" value="{{ old('username', $detail->username) }}" disabled>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-12" style="text-align: right">
                                    <a href="{{ $menu->url }}" class="btn btn-warning">KEMBALI</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection

@section('scripts')
    <script src="{{ asset('/plugins/select2/js/select2.min.js') }}"></script>
    <script src="{{ asset('/js/form-select2.js') }}"></script>
@endsection