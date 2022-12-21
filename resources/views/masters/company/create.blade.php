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
        <h6 class="mb-0 text-uppercase">Daftar {{ $menu->title }}</h6>
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
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ $menu->url }}" method="POST">
                            @csrf
                            <div class="row mb-2">
                                <div class="col-2">
                                    <label class="form-label" for="code">Kode {{ $menu->title }}</label>
                                    <input type="text" class="form-control @error('code') is-invalid @enderror" id="code" name="code" value="{{ old('code') }}">
                                    @error('code')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-10">
                                    <label class="form-label" for="name">{{ $menu->title }}</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}">
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-12">
                                    <label class="form-label" for="code">Alamat</label>
                                    <textarea name="address_1" id="address_1" cols="30" rows="5" class="form-control @error('address_1') is-invalid @enderror">{{ old('address_1') }}</textarea>
                                    @error('address_1')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-2">
                                    <label class="form-label" for="address_2">RT</label>
                                    <input type="text" class="form-control @error('address_2') is-invalid @enderror" id="address_2" name="address_2" value="{{ old('address_2') }}">
                                    @error('address_2')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-2">
                                    <label class="form-label" for="address_3">RW</label>
                                    <input type="text" class="form-control @error('address_3') is-invalid @enderror" id="address_3" name="address_3" value="{{ old('address_3') }}">
                                    @error('address_3')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-8">
                                    <label class="form-label" for="ward">Kelurahan</label>
                                    <select class="select-min form-control @error('ward') is-invalid @enderror" id="ward" name="ward">
                                        <option value="">--- SILAHKAN PILIH ---</option>
                                        @if ($wards)
                                            @foreach ($wards as $item)
                                                <option value="{{ $item->id }}" @if(old('ward') == $item->id) selected @endif>{{ $item->name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                    @error('ward')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-3">
                                    <label class="form-label" for="phone_no_1">Nomor HP 1</label>
                                    <input type="text" class="form-control @error('phone_no_1') is-invalid @enderror" id="phone_no_1" name="phone_no_1" value="{{ old('phone_no_1') }}">
                                    @error('phone_no_1')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-3">
                                    <label class="form-label" for="phone_no_2">Nomor HP 2</label>
                                    <input type="text" class="form-control @error('phone_no_2') is-invalid @enderror" id="phone_no_2" name="phone_no_2" value="{{ old('phone_no_2') }}">
                                    @error('phone_no_2')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-3">
                                    <label class="form-label" for="phone_no_3">Nomor Telp</label>
                                    <input type="text" class="form-control @error('phone_no_3') is-invalid @enderror" id="phone_no_3" name="phone_no_3" value="{{ old('phone_no_3') }}">
                                    @error('phone_no_3')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-3">
                                    <label class="form-label" for="email">Email</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}">
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-12" style="text-align: right">
                                    <a href="{{ $menu->url }}" class="btn btn-warning">KEMBALI</a>
                                    <button type="submit" class="btn btn-success">SIMPAN</button>
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