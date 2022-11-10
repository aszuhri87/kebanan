<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Kebanan - Solusi Permasalahan Ban Anda</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('images/pin.svg') }}" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous" />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet" />
</head>

<body>
    <!-- header -->
    <div class="header">
        <nav class="container d-flex justify-content-between align-items-baseline">
            <div>
                <a href="#"><img src="{{ asset('images/logo-kebanan.svg') }}" alt="Kebanan Logo" width="163px"
                        height="81px" /></a>
            </div>
            <div>
                <ul class="d-flex header-navigation">
                    <li><a href="#">Home</a></li>
                    <li><a href="#findService">Solution</a></li>
                    <li><a href="#solution">About</a></li>
                    <li><a href="#contact">Contact</a></li>
                </ul>
            </div>
        </nav>
    </div>


    


    <!-- footer -->
    <div class="container d-flex align-items-baseline mb-4 gap-5 footer">
        <div class="col">
            <img src="images/logo-kebanan.svg" alt="Kebanan Logo" width="150px" />
            <p class="footer-text_black">We provide you with the solution you need for your emergency situation at
                ease. Finding and contact faster than before.</p>
        </div>

        <div class="col">
            <h1 class="footer-header_black">Link</h1>
            <ul class="footer-text_gray">
                <li><a href="#solution">Tentang Kami</a></li>
                <li><a href="#contact">Hubungi Kami</a></li>
                <li><a href="#">Syarat & Ketentuan</a></li>
            </ul>
        </div>

        <div class="col">
            <h1 class="footer-header_black">Info Kontak</h1>
            <p class="footer-text_gray">Jl. Siliwangi No.32G, Area Sawah, Nogotirto, Kec. Gamping, Kabupaten Sleman,
                Daerah Istimewa Yogyakarta 55592</p>
            <p class="footer-text_gray">info@kebanan.id</p>
        </div>
    </div>

    <!-- copyright -->
    <div class="copyright">
        <footer class="container">
            <p>KEBANAN &#169; 2022 All Right Reserved</p>
        </footer>
    </div>

    <!-- navbar mobile -->
    <nav class="navbar bg-light fixed-bottom navbar-mobile">
        <div class="container-fluid">
            <a href="#"><img src="images/logo-kebanan.svg" alt="Kebanan Logo" class="navbar-brand" /></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas"
                data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar"
                aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                    <a href="#"><img src="images/logo-kebanan.svg" alt="Kebanan Logo"
                            class="navbar-brand" /></a>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas"
                        aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                        <li class="nav-item">
                            <a class="nav-link" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#findService-mobile">Solution</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#solution">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#contact">Contact</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>

    @include('script')

    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBj_bRjxZDlmaH8c0e0qKIpUTFF05g1nd0&libraries=places&callback=myMap">
    </script>

</body>

</html>
