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

    <!-- poster -->
    <div class="container mb-4 poster">
        <img src="images/banner.png" alt="Poster" width="100%" />
    </div>

    <div class="container mb-4 poster-mobile">
        <img src="images/banner-mobile.png" alt="Poster" width="100%" />
    </div>

    <!-- about -->
    <div id="solution" class="container d-flex justify-content-between align-items-center mb-4 about-container">
        <div class="col">
            <img class="about-image" src="images/Illustration1.svg" alt="Ilustrasi Aplikasi" width="80%" />
        </div>

        <div class="col">
            <h1 class="about-text_green">TENTANG KEBANAN</h1>
            <p class="about-text_gray">
                Melalui <span class="about-text_green">KEBANAN</span>, kami ingin menciptakan pemberdayaan ekonomi
                berkelanjutan bagi masyarakat yang berprofesi sebagai tenaga ahli tambal ban dan membantu masyarakat
                menemukan solusi tambal ban disekitar saat ban bocor terjadi. Kami berkomitmen memberikan layanan:
            </p>
            <ul class="about-text_gray">
                <li>
                    <img class="about-icon" src="images/checklist.svg" alt="Icon 1" width="20px" />
                    <span>Layanan Cepat</span>
                </li>
                <li>
                    <img class="about-icon" src="images/checklist.svg" alt="Icon 1" width="20px" />
                    <span>Mudah digunakan</span>
                </li>
                <li>
                    <img class="about-icon" src="images/checklist.svg" alt="Icon 1" width="20px" />
                    <span>Tenaga ahli Terpercaya</span>
                </li>
            </ul>
            <a class="btn btn-success button-green" href="#findService" id="findService">Pesan Sekarang</a>
        </div>
    </div>

    <!-- find-service -->
    <div class="find-service">
        <div class="find-service_container">
            <p class="find-service_header">Find Your Service Here</p>
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div class="d-flex find-service_search">
                    <img src="images/location.svg" alt="Search Location" />
                    <input id="pac-input" type="text" placeholder="Search Location"
                        class="find-service_input controls" />
                </div>
                <button class="find-service_button" onclick="myLocation()"><img src="images/center.svg"
                        alt="" /></button>
            </div>

            <div class="row">
                <form id="form-cari-bengkel">
                    <div class="col d-flex justify-content-between">
                        <div class="d-flex find-service_type">
                            <img src="images/type.svg" alt="Type Kendaraan" />
                            <select id="tipeKendaraan" class="form-select">
                                <option value="">Tipe Kendaraan</option>
                                <option value="motor">Motor</option>
                                <option value="mobil">Mobil</option>
                            </select>
                        </div>

                        <div class="d-flex find-service_type">
                            <img src="images/tire.svg" alt="Type Ban" />
                            <select id="tipeBan" class="form-select">
                                <option value="">Tipe Ban</option>
                                <option value="biasa">Biasa</option>
                                <option value="tubles">Tubles</option>
                            </select>
                        </div>

                        <div class="d-flex find-service_type">
                            <img src="images/service.svg" alt="Jenis Service" />
                            <select id="jenisService" class="form-select">
                                <option value="">Jenis Service</option>
                                <option value="antar">Pelayanan di jalan</option>
                                <option value="biasa">Datang ke bengkel</option>
                            </select>
                        </div>
                    </div>
            </div>

            <button onclick="searchBengkel()" type="button"
                class="btn btn-success btn-search button-green mx-auto mt-5">Cari Bengkel</button>
            </form>
        </div>
    </div>

    <!-- find service mobile -->
    <div class="find-service-mobile" id="findService-mobile">
        <div class="find-service_container-mobile">
            <p class="find-service_header-mobile">Find Your Service Here</p>

            <div class="row d-flex justify-content-between gap-2">
                <div class="d-flex align-items-center find-service_type-mobile">
                    <div class="d-flex align-items-center">
                        <img src="images/location.svg" alt="Search Location" />
                        <input id="pac-input-mobile" type="text" placeholder="Search Location"
                            class="find-service_input-mobile controls" />
                    </div>
                    <img src="images/center.svg" alt="Find Location" class="find-service_button-mobile"
                        onclick="myLocation()" />
                </div>

                <div class="d-flex find-service_type-mobile">
                    <img src="images/type.svg" alt="Type Kendaraan" />
                    <select id="tipeKendaraanMobile" class="form-select form-select-sm">
                        <option value="">Tipe Kendaraan</option>
                        <option value="motor">Motor</option>
                        <option value="mobil">Mobil</option>
                    </select>
                </div>

                <div class="d-flex find-service_type-mobile">
                    <img src="images/tire.svg" alt="Type Ban" />
                    <select id="tipeBanMobile" class="form-select form-select-sm">
                        <option value="">Tipe Ban</option>
                        <option value="biasa">Biasa</option>
                        <option value="tubles">Tubles</option>
                    </select>
                </div>

                <div class="d-flex find-service_type-mobile">
                    <img src="images/service.svg" alt="Jenis Service" />
                    <select id="jenisServiceMobile" class="form-select form-select-sm">
                        <option value="">Jenis Service</option>
                        <option value="antar">Antar Jemput</option>
                        <option value="biasa">Biasa</option>
                    </select>
                </div>
            </div>

            <button onclick="searchBengkel()"
                class="button-green d-flex justify-content-between align-items-center float-end mt-3"><img
                    src="images/find.svg" />Cari Tambal Ban</button>
        </div>
    </div>

    <!-- map -->
    <div class="map-container">
        <div id="googleMap" class="map-style"></div>
    </div>

    <!-- cta -->
    <div class="d-flex justify-content-center align-items-center mb-4 cta-container pt-4 pb-4">
        <div class="col d-flex justify-content-center">
            <img class="cta-image" src="images/Illustration2.svg" alt="Ilustrasi Aplikasi" width="80%" />
        </div>

        <div class="col">
            <h1 class="cta-header">Belum Terdaftar di KEBANAN?</h1>
            <p class="cta-text">Daftarkan bengkel tambal ban anda bersama KEBANAN untuk mempemudah masyarakat yang
                mencari tambal ban disekitar lokasi mereka.</p>
            <a class="btn btn-success button-white" href="/form-pendaftaran">Daftar Sekarang</a>
        </div>
    </div>

    <!-- faq -->
    <div id="about" class="container mb-5 faq-container">
        <h1 class="faq-header">Yang sering ditanyakan</h1>

        <div class="accordion" id="accordionExample">
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                        Bagaimana cara menggunakan Kebanan?
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne"
                    data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        Anda dapat mengisi form pencarian diatas, lalu masukkan lokasi tempat Anda berada atau gunakan
                        pencarian lokasi otomatis. Lalu isi beberapa informasi tambahan seperti jenis kendaraan, tipe
                        kendaraan, dan jenis servis tambal
                        ban yang diinginkan. Kemudian, website akan menampilkan beberapa tambal ban yang tersedia di
                        lokasi sekitar Anda. Pilih pin point yang tersedia untuk melihat info tentang bengkel tambal
                        ban. Anda bisa memilih untuk menghubungi
                        bengkel tersebut via whatsapp atau telepon.
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header" id="headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        Apa yang harus dilakukan ketika dalam radius tertentu tidak ada bengkel?
                    </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                    data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        Beberapa bengkel tambal ban mungkin belum terdaftar di database KEBANAN, jadi solusinya cobalah
                        untuk menggeser lokasi Anda beberapa meter dari tempat sebelumnya supaya dapat mengecek lokasi
                        dalam radius yang berbeda.
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header" id="headingThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        Berapa lama waktu yang dibutuhkan untuk menghubungi bengkel tambal ban?
                    </button>
                </h2>
                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                    data-bs-parent="#accordionExample">
                    <div class="accordion-body">Waktu yang dibutuhkan tergantung dari setiap pengerjaan bengkel tambal
                        ban yang terdaftar. Kami sarankan Anda untuk menghubungi informasi kontak yang tertera agar
                        mendapatkan jawaban yang cepat.</div>
                </div>
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header" id="headingFour">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                        Bagaimana cara mendaftar menjadi mitra di KEBANAN?
                    </button>
                </h2>
                <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour"
                    data-bs-parent="#accordionExample">
                    <div class="accordion-body">Silahkan untuk mendaftarkan Bengkel Tambal Ban Anda melalui kontak yang
                        tersedia dibawah dengan informasi yang benar dan lengkap untuk mempercepat tim kami memproses
                        data Anda.</div>
                </div>
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header" id="headingFive">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                        Apa yang harus dilakukan ketika pihak bengkel tidak ada kabar?
                    </button>
                </h2>
                <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive"
                    data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        Beberapa tambal ban mungkin sedang tidak dapat membalas pesan atau telepon anda pada waktu
                        tersebut karena sedang dalam pengerjaan atau lainnya. Solusinya, Anda bisa menghubungi bengkel
                        tambal ban lain yang berada dalam radius
                        terdekat.
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- questions -->
    <div id="contact" class="text-center questions-container mb-4">
        <h1 class="questions-header">Ada pertanyaan tentang Kebanan?, Hubungi kami!</h1>
        <p class="questions-text">Jika pertanyaan anda belum terjawab, jangan ragu untuk menghubungi kami dengan
            menekan tombol dibawah ini.</p>
        <button class="button-white mx-auto questions-button">Hubungi Sekarang</button>
    </div>

    <!-- footer -->
    <div class="container d-flex align-items-baseline mb-4 gap-5 footer">
        <div class="col">
            <img src="images/ust.png" alt="Kebanan Logo" width="50px" />
            <img src="images/logo-kebanan.svg" alt="Kebanan Logo" width="150px" />
            <p class="footer-text_black">KEBANAN merupakan karya mahasiswa Universitas Sarjanawiyata Tamansiswa hasil
                kejuaraan Program Inovasi Wirausaha Digital Mahasiswa Kementerian Pendidikan dan Kebudayaan Indonesia
            </p>
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
