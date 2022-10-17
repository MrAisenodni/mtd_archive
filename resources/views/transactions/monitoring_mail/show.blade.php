@extends('layouts.main')

@section('title', $menu->title)

@section('styles')
    {{-- Date Picker --}}
    <link href="{{ asset('/plugins/datetimepicker/css/classic.css') }}" rel="stylesheet" />
    <link href="{{ asset('/plugins/datetimepicker/css/classic.date.css') }}" rel="stylesheet" />

    {{-- Select2 --}}
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
            {{-- <div class="ms-auto">
                <div class="btn-group">
                    <a href="{{ $menu->url }}/create" class="btn btn-primary">Tambah</a>
                </div>
            </div> --}}
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
                        <form action="{{ $menu->url }}/{{ $detail->id }}" method="POST" enctype="multipart/form-data">
                            @method('put')
                            @csrf
                            <div class="row mb-2">
                                <div class="col-3">
                                    <label class="form-label" for="letter_no">Nomor Surat</label>
                                    <input type="text" class="form-control @error('letter_no') is-invalid @enderror" id="letter_no" name="letter_no" value="{{ old('letter_no', $detail->letter_no) }}">
                                    @error('letter_no')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-9">
                                    <label class="form-label" for="letter_title">Judul Surat</label>
                                    <input type="text" class="form-control @error('letter_title') is-invalid @enderror" id="letter_title" name="letter_title" value="{{ old('letter_title', $detail->letter_title) }}">
                                    @error('letter_title')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-3">
                                    <label class="form-label" for="letter_about">Perihal</label>
                                    <input type="text" class="form-control @error('letter_about') is-invalid @enderror" id="letter_about" name="letter_about" value="{{ old('letter_about', $detail->letter_about) }}">
                                    @error('letter_about')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-3">
                                    <label class="form-label" for="letter_appendix">Lampiran</label>
                                    <input type="text" class="form-control @error('letter_appendix') is-invalid @enderror" id="letter_appendix" name="letter_appendix" value="{{ old('letter_appendix', $detail->letter_appendix) }}">
                                    @error('letter_appendix')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-3">
                                    <label class="form-label" for="letter_date">Tanggal Surat</label>
                                    <input type="text" class="form-control datepicker @error('letter_date') is-invalid @enderror" id="letter_date" name="letter_date" value="{{ old('letter_date', date('d/m/Y', strtotime($detail->letter_date))) }}">
                                    @error('letter_date')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-3">
                                    <label class="form-label" for="letter_place">Tempat Surat</label>
                                    <input type="text" class="form-control @error('letter_place') is-invalid @enderror" id="letter_place" name="letter_place" value="{{ old('letter_place', $detail->letter_place) }}">
                                    @error('letter_place')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-3">
                                    <label class="form-label" for="sender_no">Nomor Pengirim (KTP/NPWP)</label>
                                    <input type="text" class="form-control @error('sender_no') is-invalid @enderror" id="sender_no" name="sender_no" value="{{ old('sender_no', $detail->sender_no) }}">
                                    @error('sender_no')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-9">
                                    <label class="form-label" for="sender_name">Nama Pengirim</label>
                                    <input type="text" class="form-control @error('sender_name') is-invalid @enderror" id="sender_name" name="sender_name" value="{{ old('sender_name', $detail->sender_name) }}">
                                    @error('sender_name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-6">
                                    <label class="form-label" for="sender_position">Posisi Pengirim</label>
                                    <input type="text" class="form-control @error('sender_position') is-invalid @enderror" id="sender_position" name="sender_position" value="{{ old('sender_position', $detail->sender_position) }}">
                                    @error('sender_position')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-6">
                                    <label class="form-label" for="sender_company">Perusahaan Pengirim</label>
                                    <input type="text" class="form-control @error('sender_company') is-invalid @enderror" id="sender_company" name="sender_company" value="{{ old('sender_company', $detail->sender_company) }}">
                                    @error('sender_company')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-12">
                                    <label class="form-label" for="letter_address">Alamat Pengirim</label>
                                    <textarea name="letter_address" id="letter_address" class="form-control" cols="30" rows="5">{!! old('letter_address', $detail->letter_address) !!}</textarea>
                                    @error('letter_address')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-12">
                                    <label class="form-label" for="letter_file">Lampiran Surat</label>
                                    <span class="desc"></span>
                                    <input type="hidden" name="old_letter_file" value="{{ $detail->letter_file }}">
                                    <input type="file" class="form-control @error('letter_file') is-invalid @enderror" id="image" name="letter_file" value="{{ old('letter_file') }}">
                                    @error('letter_file')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <a href="/download/?file={{ $detail->letter_file }}">Testing.pdf</a>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-6">
                                    <label class="form-label" for="letter_type">Tipe Surat</label>
                                    <select class="single-select form-control @error('letter_type') is-invalid @enderror" id="letter_type" name="letter_type">
                                        <option value="">--- SILAHKAN PILIH ---</option>
                                        @if ($letter_types)
                                            @foreach ($letter_types as $item)
                                                <option value="{{ $item->id }}" @if(old('letter_type', $detail->letter_type_id) == $item->id) selected @endif>{{ $item->name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                    @error('letter_type')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-6">
                                    <label class="form-label" for="letter_status">Status Surat</label>
                                    <select class="single-select form-control @error('letter_status') is-invalid @enderror" id="letter_status" name="letter_status">
                                        <option value="">--- SILAHKAN PILIH ---</option>
                                        @if ($letter_statuses)
                                            @foreach ($letter_statuses as $item)
                                                <option value="{{ $item->id }}" @if(old('letter_status', $detail->letter_status_id) == $item->id) selected @endif>{{ $item->name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                    @error('letter_status')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <label class="form-label" for="department">Departemen</label>
                                    <select class="single-select form-control @error('department') is-invalid @enderror" id="department" name="department">
                                        <option value="">--- SILAHKAN PILIH ---</option>
                                        @if ($departments)
                                            @foreach ($departments as $item)
                                                <option value="{{ $item->id }}" @if(old('department', $detail->department_id) == $item->id) selected @endif>{{ $item->name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                    @error('department')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-6">
                                    <label class="form-label" for="shelf">Lokasi Penyimpanan</label>
                                    <select class="single-select form-control @error('shelf') is-invalid @enderror" id="shelf" name="shelf">
                                        <option value="">--- SILAHKAN PILIH ---</option>
                                        @if ($shelfs)
                                            @foreach ($shelfs as $item)
                                                <option value="{{ $item->id }}" @if(old('shelf', $detail->shelf_id) == $item->id) selected @endif>{{ $item->chest->name }} | {{ $item->name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                    @error('shelf')
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
    {{-- Date Picker --}}
    <script src="{{ asset('/plugins/datetimepicker/js/legacy.js') }}"></script>
    <script src="{{ asset('/plugins/datetimepicker/js/picker.js') }}"></script>
    <script src="{{ asset('/plugins/datetimepicker/js/picker.date.js') }}"></script>
    <script src="{{ asset('/js/form-date-time-pickes.js') }}"></script>

    {{-- Select2 --}}
    <script src="{{ asset('/plugins/select2/js/select2.min.js') }}"></script>
    <script src="{{ asset('/js/form-select2.js') }}"></script>
@endsection