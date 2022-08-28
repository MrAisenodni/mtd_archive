<!doctype html>
<html lang="en" class="light-theme">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="{{ asset('/images/favicon-32x32.png') }}" type="image/png" />
  <!--plugins-->
  <link href="{{ asset('/plugins/simplebar/css/simplebar.css') }}" rel="stylesheet" />
  <link href="{{ asset('/plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet" />
  <link href="{{ asset('/plugins/metismenu/css/metisMenu.min.css') }}" rel="stylesheet" />
  <!-- Bootstrap CSS -->
  <link href="{{ asset('/css/bootstrap.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('/css/bootstrap-extended.css') }}" rel="stylesheet" />
  <link href="{{ asset('/css/style.css') }}" rel="stylesheet" />
  <link href="{{ asset('/css/icons.css') }}" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

  <!-- loader-->
	<link href="{{ asset('/css/pace.min.css') }}" rel="stylesheet" />

  <title>Error 404: Halaman Tidak Ditemukan | MTD Arsip</title>
</head>

<body>

    <!--start wrapper-->
    <div class="wrapper">
        <div class="error-404 d-flex align-items-center justify-content-center">
            <div class="container">
                <div class="card py-5">
                    <div class="row g-0">
                        <div class="col col-xl-5">
                            <div class="card-body p-4">
                                <h1 class="display-1"><span class="text-danger">4</span><span class="text-primary">0</span><span class="text-success">4</span></h1>
                                <h2 class="font-weight-bold display-4">Halaman Tidak Ditemukan</h2>
                                <div class="mt-5"> 
                                    <a href="/" class="btn btn-primary btn-lg px-md-5 radius-30">Home</a>
                                    <a href="{{ url()->previous() }}" class="btn btn-outline-dark btn-lg ms-3 px-md-5 radius-30">Kembali</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-7">
                            <img src="{{ asset('/images/error/404-error.png') }}" class="img-fluid" alt="">
                        </div>
                    </div>
                    <!--end row-->
                </div>
            </div>
        </div>
    </div>
    <!--end wrapper-->

    <!-- Bootstrap bundle JS -->
    <script src="{{ asset('/js/bootstrap.bundle.min.js') }}"></script>
    <!--plugins-->
    <script src="{{ asset('/js/jquery.min.js') }}"></script>
    <script src="{{ asset('/plugins/simplebar/js/simplebar.min.js') }}"></script>
    <script src="{{ asset('/plugins/metismenu/js/metisMenu.min.js') }}"></script>
    <script src="{{ asset('/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('/js/pace.min.js') }}"></script>
    <!--app-->
    <script src="{{ asset('/js/app.js') }}"></script>
  
</body>

</html>