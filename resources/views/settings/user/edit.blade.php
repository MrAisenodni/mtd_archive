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
            <div class="ms-auto">
                <div class="btn-group">
                    <a href="{{ $menu->url }}/create" class="btn btn-primary">Tambah</a>
                </div>
            </div>
        </div>
        <!--end breadcrumb-->
        <h6 class="mb-0 text-uppercase">Ubah {{ $menu->title }}</h6>
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
                        <form action="{{ $menu->url }}/{{ $detail->id }}" method="POST">
                            @method('put')
                            @csrf
                            <div class="row mb-2">
                                <div class="col-2">
                                    <label class="form-label" for="nik">NIK</label>
                                    <input type="text" class="form-control @error('nik') is-invalid @enderror" id="nik" name="nik" value="{{ old('nik', $detail->nik) }}">
                                    @error('nik')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-8">
                                    <label class="form-label" for="full_name">Nama Lengkap</label>
                                    <input type="text" class="form-control @error('full_name') is-invalid @enderror" id="full_name" name="full_name" value="{{ old('full_name', $detail->full_name) }}">
                                    @error('full_name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-2">
                                    <label class="form-label" for="gender">Jenis Kelamin</label>
                                    <select class="single-select form-control @error('gender') is-invalid @enderror" id="gender" name="gender">
                                        <option value="l">Laki-Laki</option>
                                        <option value="p">Perempuan</option>
                                    </select>
                                    @error('gender')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-6">
                                    <label class="form-label" for="birth_place">Tempat</label>
                                    <input type="text" class="form-control @error('birth_place') is-invalid @enderror" id="birth_place" name="birth_place" value="{{ old('birth_place', $detail->birth_place) }}">
                                    @error('birth_place')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-3">
                                    <label class="form-label" for="birth_date">Tanggal Lahir</label>
                                    <input type="date" class="form-control @error('birth_date') is-invalid @enderror" id="birth_date" name="birth_date" value="{{ old('birth_date', $detail->birth_date) }}">
                                    @error('birth_date')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-3">
                                    <label class="form-label" for="join_date">Tanggal Masuk</label>
                                    <input type="date" class="form-control @error('join_date') is-invalid @enderror" id="join_date" name="join_date" value="{{ old('join_date', $detail->join_date) }}">
                                    @error('join_date')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-6">
                                    <label class="form-label" for="email">Email</label>
                                    <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', $detail->email) }}">
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-3">
                                    <label class="form-label" for="phone_number">Nomor HP</label>
                                    <input type="text" class="form-control @error('phone_number') is-invalid @enderror" id="phone_number" name="phone_number" value="{{ old('phone_number', $detail->phone_number) }}">
                                    @error('phone_number')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-3">
                                    <label class="form-label" for="home_number">Nomor Telp</label>
                                    <input type="text" class="form-control @error('home_number') is-invalid @enderror" id="home_number" name="home_number" value="{{ old('home_number', $detail->home_number) }}">
                                    @error('home_number')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-12">
                                    <label class="form-label" for="address">Alamat Lengkap</label>
                                    <textarea name="address" id="address" cols="30" rows="10" class="form-control @error('address') is-invalid @enderror">{{ old('address', $detail->address) }}</textarea>
                                    @error('address')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <label class="form-label" for="religion">Agama</label>
                                    <select class="single-select form-control @error('religion') is-invalid @enderror" id="religion" name="religion">
                                        <option value="">--- SILAHKAN PILIH ---</option>
                                        @if ($religions)
                                            @foreach ($religions as $item)
                                                <option value="{{ $item->id }}" @if(old('religion', $detail->religion_id) == $item->id) selected @endif>{{ $item->name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                    @error('religion')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-6">
                                    <label class="form-label" for="position">Posisi</label>
                                    <select class="single-select form-control @error('position') is-invalid @enderror" id="position" name="position">
                                        <option value="">--- SILAHKAN PILIH ---</option>
                                        @if ($positions)
                                            @foreach ($positions as $item)
                                                <option value="{{ $item->id }}" @if(old('position', $detail->position_id) == $item->id) selected @endif>{{ $item->name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                    @error('position')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-12" style="text-align: right">
                                    <a href="{{ $menu->url }}" class="btn btn-warning">KEMBALI</a>
                                    <button type="submit" name="delete" class="btn btn-danger" value="1">HAPUS</button>
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