@extends('layouts.main')

@section('title', $menu->title)

@section('styles')
    {{-- Data Table --}}
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
            <div class="col-8">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="default" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th style="width: 5%">No</th>
                                        <th>{{ $menu->title }}</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($data)
                                        @foreach ($data as $item)
                                            <tr data-id="{{ $item->id }}">
                                                <td class="text-center">{{ $loop->iteration }}</td>
                                                <td>{{ $item->name }}</td>
                                                <td class="text-center" style="width: 5%">
                                                    <a href="{{ $menu->url }}/{{ $item->id }}"><i class="bx bx-edit"></i></a>
                                                    <form action="{{ $menu->url }}/{{ $item->id }}" method="POST" class="d-inline">
                                                        @method('delete')
                                                        @csrf
                                                        <button type="submit" class="bx bx-trash text-danger sa-warning" style="border: 0px; background: 0%"></button>
                                                    </form>
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
            <div class="col col-4">
                <div class="card">
                    <div class="card-body">
                        @if (request()->path() == substr($menu->url, 1))
                            @include('masters.retention.create')
                        @else
                            @include('masters.retention.edit')
                        @endif
                    </div>
                </div>
            </div>
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