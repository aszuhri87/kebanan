<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/x-icon" href="{{asset('images/pin.svg')}}" />

    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('css/dropify.css')}}" />

    <title>KEBANAN</title>

    <style>
        #map, #map2 {
        height: 500px;
        /* border: 1px solid #000; */
        border-radius: 5px;
        }

        .pac-container {
            background-color: #FFF;
            z-index: 20;
            position: fixed;
            display: inline-block;
            float: left;
        }
        .modal{
            z-index: 20;
        }
        .modal-backdrop{
            z-index: 10;
        }

        .btn {
            border-radius: 10px;
        }​

    </style>

    @stack('style')
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="{{url('/')}}">
                <img src="{{asset('images/logo-kebanan.svg')}}" class="" width="100px" alt="">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto text-white">
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('admin/bengkel')}}">Bengkel</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('admin/user')}}">Admin</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Hi, {{(Auth::guard('admin')->user()->nama)}}
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="border-radius: 0%; top: 45px;">
                            <a class="dropdown-item" href="{{url('admin/logout')}}">Logout</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        @yield('content')
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/dropify@0.2.2/dist/js/dropify.min.js"></script>
    <script src="{{asset('js/jquery.blockUI.js')}}"></script>

    @stack('script')
</body>

</html>
