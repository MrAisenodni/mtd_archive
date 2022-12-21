@extends('layouts.main')

@section('title', $menu->title)

@section('styles')
    <link href="{{ asset('/plugins/datatable/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('/plugins/sweet-alert/sweetalert2.min.css') }}" rel="stylesheet" />
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
                        <div class="table-responsive">
                            <table id="default" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th style="width: 5%">No</th>
                                        <th>No Surat</th>
                                        <th>Judul</th>
                                        <th>Tanggal</th>
                                        <th>Tempat</th>
                                        <th>Pengirim</th>
                                        <th>Tipe</th>
                                        <th>Status</th>
                                        <th>Lampiran</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($data)
                                        @foreach ($data as $item)
                                            <tr data-id="{{ $item->id }}">
                                                <td class="text-center">{{ $loop->iteration }}</td>
                                                <td>{{ $item->letter_no }}</td>
                                                <td>{{ $item->letter_title }}</td>
                                                <td>{{ $item->letter_date }}</td>
                                                <td>{{ $item->letter_place }}</td>
                                                <td>
                                                    <b>{{ $item->sender_name }}</b><br>
                                                    {{ $item->sender_position }} | {{ $item->sender_company }}
                                                </td>
                                                <td>
                                                    @if ($item->letter_type)
                                                        {{ $item->letter_type->name }}
                                                    @else
                                                        -
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($item->letter_status)
                                                        {{ $item->letter_status->name }}
                                                    @else
                                                        -
                                                    @endif
                                                </td>
                                                <td>-</td>
                                                <td class="text-center" style="width: 5%">
                                                    @if ($access->edit == 1)
                                                        <a href="{{ $menu->url }}/{{ $item->id }}/edit"><i class="bx bx-edit"></i></a>
                                                    @endif
                                                    @if ($access->delete == 1)
                                                    <form action="{{ $menu->url }}/{{ $item->id }}" method="POST" class="d-inline">
                                                        @method('delete')
                                                        @csrf
                                                        <button id="delete" type="submit" class="bx bx-trash text-danger sa-warning" style="border: 0px; background: 0%"></button>
                                                    </form>
                                                    @endif
                                                    @if ($access->detail == 1)
                                                        <a href="{{ $menu->url }}/{{ $item->id }}"><i class="lni lni-eye"></i></a>
                                                    @endif
                                                    <a href="/download/?file={{ $item->letter_file }}"><i class="bx bx-download"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            {{-- <div class="col col-4">
                <div class="card">
                    <div class="card-body">
                        @if (request()->path() == substr($menu->url, 1))
                            @include('masters.department.create')
                        @else
                            @include('masters.department.edit')
                        @endif
                    </div>
                </div>
            </div> --}}
        </div>
    </main>
@endsection

@section('scripts')
    {{-- Data Table --}}
    <script src="{{ asset('/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('/plugins/datatable/js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('/js/table-datatable.js') }}"></script>

    {{-- Sweet Alert --}}
    <script src="{{ asset('/plugins/sweet-alert/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('/js/sweet-alert.init.js') }}"></script>
@endsection