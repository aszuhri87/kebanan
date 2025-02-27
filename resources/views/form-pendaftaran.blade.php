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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css" />
</head>

<body>
    <!-- header -->
    <div class="header">
        <nav class="container d-flex justify-content-between align-items-baseline">
            <div>
                <a href="/"><img src="{{ asset('images/logo-kebanan.svg') }}" alt="Kebanan Logo" width="163px"
                        height="81px" /></a>
            </div>
            <div>
                <ul class="d-flex header-navigation">
                    <li><a href="/">Home</a></li>
                    <li><a href="/#findService">Solution</a></li>
                    <li><a href="/#solution">About</a></li>
                    <li><a href="/#contact">Contact</a></li>
                </ul>
            </div>
        </nav>
    </div>

    <!-- header form -->
    <div class="container text-center mt-5">
        <h1 class="form-header_header">Daftarkan Bengkel Anda</h1>
        <p class="form-header_text">Daftarkan bengkel anda di KEBANAN sekarang juga untuk menjangkau lebih banyak
            pelanggan.</p>
    </div>

    <!-- form -->
    <form class="container container-form_mobile w-75 mx-auto mt-5" id="form-daftar"
        action="{{ url('daftar-bengkel') }}" method="post" enctype="multipart/form-data">
        @csrf
        @if (session('message'))
            <div class="alert alert-success mt-5" role="alert">
                {{ session('message') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger mt-5" role="alert">
                {{ session('error') }}
            </div>
        @endif
        <div class="row gap-5 form-row_mobile">
            <div class="col mb-4">
                <label class="form-label">Nama Bengkel <span class="text-danger">*</span> </label>
                <input type="text" name="nama_bengkel" class="form-control" placeholder="Masukkan nama bengkel..."
                    required />
            </div>
            <div class="col mb-4">
                <label class="form-label">Nama Pemilik <span class="text-danger">*</span> </label>
                <input type="text" name="nama_pemilik" class="form-control" placeholder="Masukan nama pemilik..."
                    required />
            </div>
        </div>
        <div class="row gap-5 form-row_mobile">
            <div class="col mb-4">
                <label class="form-label">No HP <span class="text-danger">*</span> </label>
                <div class="input-group">
                    <span class="input-group-text form-control form-number">+62</span>
                    <input type="number" name="nomor_hp" class="form-control form-number_input" placeholder="Masukan no HP..." />
                </div>
            </div>
            <div class="col mb-4">
                <label class="form-label">Keterangan <span class="text-danger">*</span> </label>
                <input type="text" name="keterangan" class="form-control"
                    placeholder="Masukan keterangan bengkel anda..." required />
            </div>
        </div>
        <div class="row gap-5">
            <div class="col mb-4">
                <label class="form-label">Alamat <span class="text-danger">*</span> </label>
                <input type="text" name="alamat" class="form-control" placeholder="Masukan alamat bengkel anda..."
                    required />
            </div>
        </div>

        <!-- map -->
        <p class="form-map_caution">Pilih/klik titik lokasi bengkel anda di map <img
                src="{{ asset('images/warning.svg') }}" alt="warning" width="9px" height="9px" /></p>
        <div class="map-container mb-4">
            <div id="googleMap" class="form-map"></div>
        </div>

        <div class="row gap-5 form-row_mobile">
            <div class="col mb-4">
                <label class="form-label">Latitude</label>
                <input type="text" name="latitude" id="latitude" class="form-control" readonly />
            </div>
            <div class="col mb-4">
                <label class="form-label">Longitude </label>
                <input type="text" name="longitude" id="longitude" class="form-control" readonly />
            </div>
        </div>

        <div class="row gap-5 form-row_mobile">
            <div class="col mb-4">
                <label class="form-label">Foto Bengkel <span class="text-danger">*</span> </label>
                <input type="file" name="foto_bengkel" class="dropify d-block" data-height="300" />
            </div>
            <div class="col mb-4">
                <label class="form-label">Jenis Layanan <span class="text-danger">*</span> </label>
                <div class="form-check">
                    <div class="d-flex align-items-end mb-2">
                        <input type="hidden" name="terima_tubles" value="0"><input type="checkbox"
                            class="form-check-input"
                            onclick="this.previousSibling.value=1-this.previousSibling.value">
                        <label class="form-check-label">Terima Tubles</label>
                    </div>
                    <div class="d-flex align-items-end mb-2">
                        <input type="hidden" name="terima_non_tubles" value="0"><input type="checkbox"
                            class="form-check-input"
                            onclick="this.previousSibling.value=1-this.previousSibling.value">
                        <label class="form-check-label">Terima non Tubles</label>
                    </div>
                    <div class="d-flex align-items-end mb-2">
                        <input type="hidden" name="terima_panggilan" value="0"><input type="checkbox"
                            class="form-check-input"
                            onclick="this.previousSibling.value=1-this.previousSibling.value">
                        <label class="form-check-label">Terima Panggilan</label>
                    </div>
                    <div class="d-flex align-items-end mb-2">
                        <input type="hidden" name="terima_motor" value="0"><input type="checkbox"
                            class="form-check-input"
                            onclick="this.previousSibling.value=1-this.previousSibling.value">
                        <label class="form-check-label">Terima Motor</label>
                    </div>
                    <div class="d-flex align-items-end mb-2">
                        <input type="hidden" name="terima_mobil" value="0"><input type="checkbox"
                            class="form-check-input"
                            onclick="this.previousSibling.value=1-this.previousSibling.value">
                        <label class="form-check-label">Terima Mobil</label>
                    </div>
                    <div class="d-flex align-items-end">
                        <input type="hidden" name="terima_kendaraan_berat" value="0"><input type="checkbox"
                            class="form-check-input"
                            onclick="this.previousSibling.value=1-this.previousSibling.value">
                        <label class="form-check-label">Terima Kendaraan Berat</label>
                    </div>
                </div>
            </div>
        </div>
        <button type="submit" class="button-green mx-auto form-button mb-5">Daftar Sekarang</button>
    </form>

    <!-- footer -->
    <div class="container d-flex align-items-baseline mb-4 gap-5 footer">
        <div class="col footer-mobile-logo">
            <img src="images/ust.png" alt="Kebanan Logo" width="50px" />
            <img src="images/logo-kebanan.svg" alt="Kebanan Logo" width="150px" />
            <p class="footer-text_black">KEBANAN merupakan karya mahasiswa Universitas Sarjanawiyata Tamansiswa hasil
                kejuaraan Program Inovasi Wirausaha Digital Mahasiswa Kementerian Pendidikan dan Kebudayaan Indonesia
            </p>
        </div>

        <div class="col footer-mobile-link">
            <h1 class="footer-header_black">Link</h1>
            <ul class="footer-text_gray">
                <li><a href="/#solution">Tentang Kami</a></li>
                <li><a href="/#contact">Hubungi Kami</a></li>
                <li><a href="/#">Syarat & Ketentuan</a></li>
            </ul>
        </div>

        <div class="col">
            <h1 class="footer-header_black">Info Kontak</h1>
            <p class="footer-text_gray">Jl. Kusumanegara No.157, Muja Muju, Kec. Umbulharjo, Kota Yogyakarta, Daerah
                Istimewa Yogyakarta 55167</p>
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
                            <a class="nav-link" href="/">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/#findService-mobile">Solution</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/#solution">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/#contact">Contact</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>

    @include('script-pendaftaran')

    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAJfzOqR9u2eyXv6OaiuExD3jzoBGGIVKY&libraries=places&callback=myMap">
    </script>
    <script>
        $(document).ready(function() {
            $(".dropify").dropify();
        });
    </script>

</body>

</html>
