<!doctype html>
<html lang="en" class="light-theme">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="{{ asset('/images/favicon-32x32.png') }}" type="image/png" />

  <!-- Bootstrap CSS -->
  <link href="{{ asset('/css/bootstrap.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('/css/bootstrap-extended.css') }}" rel="stylesheet" />
  <link href="{{ asset('/css/style.css') }}" rel="stylesheet" />
  <link href="{{ asset('/css/icons.css') }}" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

  <!-- loader-->
	<link href="{{ asset('/css/pace.min.css') }}" rel="stylesheet" />

  <title>Login | MTD Arsip</title>
</head>

<body>
    <!--start wrapper-->
    <div class="wrapper">
        <!--start content-->
        <main class="authentication-content">
            <div class="container-fluid">
                <div class="authentication-card">
                    <div class="card shadow rounded-0 overflow-hidden">
                        <div class="row g-0">
                            <div class="col-lg-6 bg-login d-flex align-items-center justify-content-center">
                                <img src="{{ asset('/images/error/login-img.jpg') }}" class="img-fluid" alt="">
                            </div>
                            <div class="col-lg-6">
                            <div class="card-body p-4 p-sm-5">
                                <h5 class="card-title">Masuk MTD Arsip</h5>
                                <p class="card-text mb-5">Assalamualaikum Warrahmatullahi Wabarakatuh</p>
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
                                                    <div class="fs-3 text-danger"><i class="bi bi-exclamation-triangle-fill"></i>
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
                                        <form class="form-body" method="POST" action="/mtd-login">
                                            @csrf
                                            <div class="row g-3">
                                                <div class="col-12">
                                                    <label for="username" class="form-label">Email/Nama Pengguna</label>
                                                    <div class="ms-auto position-relative">
                                                        <input type="text" class="form-control radius-30 ps-3 @error('username') is-invalid @enderror" id="username" name="username" placeholder="Masukkan Email/Nama Pengguna" value="{{ old('username') }}">
                                                        @error('username')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <label for="password" class="form-label">Kata Sandi</label>
                                                    <div class="ms-auto position-relative">
                                                        <input type="password" class="form-control radius-30 ps-3 @error('password') is-invalid @enderror" id="password" name="password" placeholder="Masukkan Kata Sandi" value="{{ old('password') }}">
                                                        @error('password')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked="">
                                                        <label class="form-check-label" for="flexSwitchCheckChecked">Ingat saya</label>
                                                    </div>
                                                </div>
                                                <div class="col-6 text-end">	
                                                    <a href="authentication-forgot-password.html">Lupa Kata Sandi?</a>
                                                </div>
                                                <div class="col-12">
                                                    <div class="d-grid">
                                                        <button type="submit" class="btn btn-primary radius-30">MASUK</button>
                                                    </div>
                                                </div>
                                                {{-- <div class="col-12">
                                                    <p class="mb-0">Don't have an account yet? <a href="authentication-signup.html">Sign up here</a></p>
                                                </div> --}}
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>  
                    </div>
                </div>
            </div>
        </main>
        <!--end page main-->
    </div>
    <!--end wrapper-->

    <!-- Bootstrap bundle JS -->
    <script src="{{ asset('/js/bootstrap.bundle.min.js') }}"></script>

    <!--plugins-->
    <script src="{{ asset('/js/jquery.min.js') }}"></script>
    <script src="{{ asset('/js/pace.min.js') }}"></script>
</body>

</html>