<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Kebanan - Solusi Permasalahan Ban Anda</title>
    <link rel="icon" type="image/x-icon" href="{{asset('images/pin.svg')}}" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous" />
    <link rel="stylesheet" href="{{asset('css/style.css')}}" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet" />
</head>

<body>
    <!-- header -->
    <div class="header">
        <nav class="container d-flex justify-content-between align-items-baseline">
            <div>
                <a href="#"><img src="{{asset('images/logo-kebanan.svg')}}" alt="Kebanan Logo" width="163px" height="81px" /></a>
            </div>
            <div>
                <ul class="d-flex header-navigation">
                    <li><a href="#">Home</a></li>
                    <li><a href="#googleMap">Solution</a></li>
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
            <h2 class="about-text_black">Solusi Permasalahan Ban Anda</h2>
            <p class="about-text_gray">
                <span class="about-text_green">KEBANAN</span> membantu anda dalam mencari bengkel tambal ban di sekitar
                anda ketika ban anda bocor, cukup masukan informasi mengenai kendaraan anda, kemudian cari lokasi
                bengkel tambal ban terdekat,
                hubungi bengkel. Kenapa anda harus menggunakan KEBANAN:
            </p>
            <ul class="about-text_gray">
                <li>
                    <img class="about-icon" src="images/checklist.svg" alt="Icon 1" width="20px" />
                    <span>Pelayanan Cepat</span>
                </li>
                <li>
                    <img class="about-icon" src="images/checklist.svg" alt="Icon 1" width="20px" />
                    <span>Mudah & Terpercaya</span>
                </li>
                <li>
                    <img class="about-icon" src="images/checklist.svg" alt="Icon 1" width="20px" />
                    <span>Harga Terjangkau</span>
                </li>
            </ul>
            <a class="btn btn-success button-green" href="#googleMap">Pesan Sekarang</a>
        </div>
    </div>

    <!-- map -->
    <div class="map-container">
        <div id="googleMap" class="map-style"></div>
        <!-- find-service -->
        <div class="find-service">
            <div class="find-service_container">
                <p class="find-service_header">Find Your Service Here</p>
                <div class="d-flex justify-content-between mb-4">
                    <div class="d-flex find-service_search">
                        <img src="images/location.svg" alt="Search Location" />
                        <input id="pac-input" type="text" placeholder="Search Location"
                            class="find-service_input controls" />
                    </div>
                    <button class="find-service_button" onclick="myLocation()"><img src="images/center.svg"
                            alt="" /></button>
                </div>

                <div class="row">
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
                                <option value="antar">Antar Jemput</option>
                                <option value="biasa">Biasa</option>
                            </select>
                        </div>
                    </div>
                </div>

                <button onclick="searchBengkel()" class="btn btn-success button-green mx-auto mt-5">Cari Bengkel</button>
            </div>
        </div>

        <!-- find service mobile -->
        <div class="find-service-mobile">
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
    </div>

    <!-- cta -->
    <div class="d-flex justify-content-center align-items-center mb-4 cta-container pt-4 pb-4">
        <div class="col d-flex justify-content-center">
            <img class="cta-image" src="images/Illustration2.svg" alt="Ilustrasi Aplikasi" width="80%" />
        </div>

        <div class="col">
            <h1 class="cta-header">Belum Terdaftar di KEBANAN?</h1>
            <p class="cta-text">Start working with Tailwind CSS that can provide everything you need to generate
                awareness, drive traffic, connect.</p>
            <button class="button-white">Daftar Sekarang</button>
        </div>
    </div>

    <!-- faq -->
    <div id="about" class="container mb-4 faq-container">
        <h1 class="faq-header">Yang sering ditanyakan</h1>

        <div class="accordion" id="accordionExample">
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                        Apa yang harus dilakukan ketika dalam radius tertentu tidak ada bengkel?
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne"
                    data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi facilis praesentium esse, odio
                        explicabo incidunt, rerum nam doloremque sapiente aspernatur error neque consectetur possimus
                        dolorum ratione ipsum tempora fuga
                        autem?
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
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi facilis praesentium esse, odio
                        explicabo incidunt, rerum nam doloremque sapiente aspernatur error neque consectetur possimus
                        dolorum ratione ipsum tempora fuga
                        autem?
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header" id="headingThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        Berapa lama waktu yang dibutuhkan untuk menambal ban?
                    </button>
                </h2>
                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                    data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Repudiandae sed necessitatibus nam
                        sapiente, est veniam non accusantium odit. Animi ad nostrum voluptas voluptatibus omnis harum
                        sed aspernatur veniam numquam corrupti?
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header" id="headingFour">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                        Bagaimana jika ada tindak penipuan yang dilakukan oleh pihak bengkel?
                    </button>
                </h2>
                <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour"
                    data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Repudiandae sed necessitatibus nam
                        sapiente, est veniam non accusantium odit. Animi ad nostrum voluptas voluptatibus omnis harum
                        sed aspernatur veniam numquam corrupti?
                    </div>
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
                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Repudiandae sed necessitatibus nam
                        sapiente, est veniam non accusantium odit. Animi ad nostrum voluptas voluptatibus omnis harum
                        sed aspernatur veniam numquam corrupti?
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- questions -->
    <div id="contact" class="text-center questions-container mb-4">
        <h1 class="questions-header">Ada pertanyaan tentang Kebanan?, Hubungi kami!</h1>
        <p class="questions-text">Start working with Tailwin CSS that can provide everything you need to generate
            awareness, drive traffic, connect</p>
        <button class="button-white mx-auto questions-button">Hubungi Sekarang</button>
    </div>

    <!-- footer -->
    <div class="container d-flex align-items-baseline mb-4 gap-5 footer">
        <div class="col">
            <img src="images/logo-kebanan.svg" alt="Kebanan Logo" width="150px" />
            <p class="footer-text_black">We guarantee superior service and quality on every product you purchase, and we
                will assist you in becoming more successful.</p>
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
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
                aria-controls="offcanvasNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar"
                aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                    <a href="#"><img src="images/logo-kebanan.svg" alt="Kebanan Logo" class="navbar-brand" /></a>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                        <li class="nav-item">
                            <a class="nav-link" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#googleMap">Solution</a>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>

    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAJfzOqR9u2eyXv6OaiuExD3jzoBGGIVKY&libraries=places&callback=myMap">
    </script>

    @include('script')
</body>

</html>

<!-- API from office : AIzaSyAGE_qMyu1KZXZga00ynayQTxP2wm1kllg -->
<!-- API free : AIzaSyAJfzOqR9u2eyXv6OaiuExD3jzoBGGIVKY -->
