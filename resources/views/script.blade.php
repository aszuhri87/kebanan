<script>

    let locationBengkel = [];

    let map = null;
    let myMarker = null;
    let myCircle = null;
    let bengkelMarkers = null;

    // map function
    function myMap() {
        let myCenter = new google.maps.LatLng(-7.758046187031497, 110.32821718384228);

        // map properties
        let mapProp = {
            center: myCenter,
            zoom: 14,
            mapTypeControl: false,
            streetViewControl: false,
            fullscreenControl: false,
            zoomControl: false,
            disableDefaultUI: true,
            styles: styleMap,
        };

        // circle
        myCircle = new google.maps.Circle({
            center: myCenter,
            radius: 2000,
            strokeColor: "rgba(0,0,0,0)",
            fillColor: "#019444",
            fillOpacity: 0.2
        });

        // marker
        myMarker = new google.maps.Marker({
            position: myCenter,
            icon: './images/pin.svg',
        });

        // map
        map = new google.maps.Map(document.getElementById("googleMap"), mapProp);

        // search location use autocomplete
        let inputDesktop = document.getElementById("pac-input");
        let inputMobile = document.getElementById("pac-input-mobile");

        const options = {
            componentRestrictions: {
                country: "id"
            },
            fields: ["address_components", "geometry", "name"],
            strictBounds: false,
            types: ["establishment"],
        };

        autocompleteDesktop = new google.maps.places.Autocomplete(inputDesktop, options);
        autocompleteMobile = new google.maps.places.Autocomplete(inputMobile, options);

        autocompleteDesktop.addListener("place_changed", () => {
            if (bengkelMarkers && bengkelMarkers.setMap) {
                bengkelMarkers.setMap(null);
            }

            const place = autocompleteDesktop.getPlace();
            if (!place.geometry) {
                return;
            }

            if (place.geometry.viewport) {
                map.fitBounds(place.geometry.viewport);
                map.setZoom(14);
            } else {
                map.setCenter(place.geometry.location);
                map.setZoom(14);
            }

            myMarker.setPosition(place.geometry.location);
            myMarker.setVisible(true);

            myCircle.setCenter(place.geometry.location);
            myCircle.setMap(map);
        });

        autocompleteMobile.addListener("place_changed", () => {
            const place = autocompleteMobile.getPlace();
            if (!place.geometry) {
                return;
            }

            if (place.geometry.viewport) {
                map.fitBounds(place.geometry.viewport);
                map.setZoom(14);
            } else {
                map.setCenter(place.geometry.location);
                map.setZoom(14);
            }

            myMarker.setPosition(place.geometry.location);
            myMarker.setVisible(true);

            myCircle.setCenter(place.geometry.location);
            myCircle.setMap(map);
        });

        // use methods
        myMarker.setMap(map);
        myCircle.setMap(map);

        autocompleteDesktop.bindTo("bounds", map);
        autocompleteMobile.bindTo("bounds", map);
    }

    // find location
    function myLocation() {
        if (bengkelMarkers && bengkelMarkers.setMap) {
            bengkelMarkers.setMap(null);
        }

        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition);
        } else {
            alert("Geolocation is not supported by this browser.");
        }
    }

    function showPosition(position) {
        let lat = position.coords.latitude;
        let lng = position.coords.longitude;

        let myCenter = new google.maps.LatLng(lat, lng);

        // map properties
        let mapProp = {
            center: new google.maps.LatLng(lat, lng),
            zoom: 14,
            mapTypeControl: false,
            streetViewControl: false,
            fullscreenControl: false,
            zoomControl: false,
            disableDefaultUI: true,
            styles: styleMap,
        };

        // circle
        myCircle.setMap(null);
        myCircle = new google.maps.Circle({
            center: myCenter,
            radius: 2000,
            strokeColor: "rgba(0,0,0,0)",
            fillColor: "#019444",
            fillOpacity: 0.2
        });

        // marker
        myMarker.setMap(null);
        myMarker = new google.maps.Marker({
            position: myCenter,
            icon: './images/pin.svg',
        });

        // console.log(position.coords.latitude);

        // use methods
        myMarker.setMap(map);
        myCircle.setMap(map);
    }

    // search bengkel
    function searchBengkel() {

        // Desktop
        let makerLat = myMarker.position.lat();
        let makerLng = myMarker.position.lng();
        let tipeKendaraan = document.getElementById("tipeKendaraan").value;
        let tipeBan = document.getElementById("tipeBan").value;
        let jenisService = document.getElementById("jenisService").value;

        //post data
        $.ajax({
            url: "/",
            type: "POST",
            async: false,
            cache: false,
            data: {
                "_token": "{{ csrf_token() }}",
                "tipeKendaraan": tipeKendaraan,
                "tipeBan": tipeBan,
                "jenisService": jenisService,
                "lat": makerLat,
                "lng": makerLng
            }
        })
        .done(function(res, xhr, meta) {
            locationBengkel = res.data;

            console.log(locationBengkel);
        })
        .fail(function(res, error) {
            console.error(res.responseJSON.message, 'Gagal')
        })
        .always(function() { });

        // Mobile
        let tipeKendaraanMobile = document.getElementById("tipeKendaraanMobile").value;
        let tipeBanMobile = document.getElementById("tipeBanMobile").value;
        let jenisServiceMobile = document.getElementById("jenisServiceMobile").value;

        console.log(tipeKendaraan);
        console.log(tipeBan);
        console.log(jenisService);
        console.log(tipeKendaraanMobile);
        console.log(tipeBanMobile);
        console.log(jenisServiceMobile);

        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showAllBengkel);
        } else {
            alert("Geolocation is not supported by this browser.");
        }
    }

    function showAllBengkel(position) {

        if (bengkelMarkers && bengkelMarkers.setMap) {
            bengkelMarkers.setMap(null);
        }

        let lat = position.coords.latitude;
        let lng = position.coords.longitude;

        let myCenter = new google.maps.LatLng(lat, lng);

        // map properties
        let mapProp = {
            center: new google.maps.LatLng(lat, lng),
            zoom: 14,
            mapTypeControl: false,
            streetViewControl: false,
            fullscreenControl: false,
            zoomControl: false,
            disableDefaultUI: true,
            styles: styleMap,
        };

        // ALL BENGKEL
        if (Array.isArray(locationBengkel)){
            // make marker on map from locationBengkel
            locationBengkel.forEach((item) => {

            // calculate radius
            if (item.radius <= 2000){
                bengkelMarkers = new google.maps.Marker({
                    position: new google.maps.LatLng(item.lat, item.lng),
                    map: map,
                    title: item.title,
                    icon: './images/workshop.svg',
                });

                // info window
                let infowindow = new google.maps.InfoWindow({
                    content: `<div class="container d-flex justify-content-around modal-container">
                <div>
                <img src="${item.foto_bengkel}" class="d-block modal-image"/>
                <button onclick="chatWhatsapp(${item.nomor_hp})" class="modal-button-green mb-1 mt-2"><img src="./images/whatsapp.svg" alt="Whatsapp" width="9" /> Whatsapp</button>
                <button onclick="callPhone(${item.nomor_hp})" class="modal-button-white"><img src="./images/phone.svg" alt="Telephone" width="9" /> Telepon</button>
                </div>

                <div>
                <h1 class="modal-header">${item.namaBengkel}</h1>
                <p class="modal-text">${item.alamatBengkel}</p>
                <ul class="modal-text_gray">
                ${item.tubles == 1 ? `<li>
                <img class="modal-icon" src="images/checklist.svg" alt="Icon 1" />
                <span>Tubles</span>
                </li>` : `<li>
                <img class="modal-icon" src="images/un-checklist.svg" alt="Icon 1" />
                <span>Tubles</span>
                </li>` }
                ${item.nonTubles == 1 ? `<li>
                <img class="modal-icon" src="images/checklist.svg" alt="Icon 1" />
                <span>Non-Tubles</span>
                </li>` : `<li>
                <img class="modal-icon" src="images/un-checklist.svg" alt="Icon 1" />
                <span>Non-Tubles</span>
                </li>` }
                ${item.terima_motor == 1 ? `<li>
                <img class="modal-icon" src="images/checklist.svg" alt="Icon 1" />
                <span>Motor</span>
                </li>` : `<li>
                <img class="modal-icon" src="images/un-checklist.svg" alt="Icon 1" />
                <span>Motor</span>
                </li>` }
                ${item.terima_mobil == 1 ? `<li>
                <img class="modal-icon" src="images/checklist.svg" alt="Icon 1" />
                <span>Mobil</span>
                </li>` : `<li>
                <img class="modal-icon" src="images/un-checklist.svg" alt="Icon 1" />
                <span>Mobil</span>
                </li>` }
                ${item.repairOnDelivery == 1 ? `<li>
                <img class="modal-icon" src="images/checklist.svg" alt="Icon 1" />
                <span>Repair On Delivery</span>
                </li>` : `<li>
                <img class="modal-icon" src="images/un-checklist.svg" alt="Icon 1" />
                <span>Repair On Delivery</span>
                </li>`}
                ${item.terima_kendaraan_berat == 1 ? `<li>
                <img class="modal-icon" src="images/checklist.svg" alt="Icon 1" />
                <span>Terima Kendaraan Berat</span>
                </li>` : `<li>
                <img class="modal-icon" src="images/un-checklist.svg" alt="Icon 1" />
                <span>Terima Kendaraan Berat</span>
                </li>`}
                </ul>
                </div>
                </div>`
                    });

                    // event listener
                    google.maps.event.addListener(bengkelMarkers, 'click', function () {
                        infowindow.open(map, bengkelMarkers);
                    });

                    bengkelMarkers.setMap(map);
                }
                else {
                    if (bengkelMarkers && bengkelMarkers.setMap) {
                        bengkelMarkers.setMap(null);
                    }
                }
            })
        }
    }

    function chatWhatsapp(phone) {
        window.open(
            `https://api.whatsapp.com/send?phone=`+ phone +`&text=Halo ban saya bocor, bisa minta bantuannya?`,
            "_blank"
        );
    }

    function callPhone(phone) {
        window.open(`tel:+`+ phone, "_blank");
    }

    // style map
    const styleMap = [{
            "featureType": "poi.attraction",
            "elementType": "labels.icon",
            "stylers": [{
                "color": "#bdbdbd"
            }]
        },
        {
            "featureType": "poi.attraction",
            "elementType": "labels.text.fill",
            "stylers": [{
                "color": "#737373"
            }]
        },
        {
            "featureType": "poi.business",
            "elementType": "labels.icon",
            "stylers": [{
                "color": "#bdbdbd"
            }]
        },
        {
            "featureType": "poi.business",
            "elementType": "labels.text.fill",
            "stylers": [{
                "color": "#737373"
            }]
        },
        {
            "featureType": "poi.government",
            "elementType": "labels.icon",
            "stylers": [{
                "color": "#bdbdbd"
            }]
        },
        {
            "featureType": "poi.government",
            "elementType": "labels.text.fill",
            "stylers": [{
                "color": "#737373"
            }]
        },
        {
            "featureType": "poi.medical",
            "elementType": "labels.icon",
            "stylers": [{
                "color": "#ff8f8f"
            }]
        },
        {
            "featureType": "poi.medical",
            "elementType": "labels.text",
            "stylers": [{
                "visibility": "simplified"
            }]
        },
        {
            "featureType": "poi.medical",
            "elementType": "labels.text.fill",
            "stylers": [{
                "color": "#737373"
            }]
        },
        {
            "featureType": "poi.park",
            "elementType": "labels",
            "stylers": [{
                "visibility": "simplified"
            }]
        },
        {
            "featureType": "poi.park",
            "elementType": "labels.icon",
            "stylers": [{
                "color": "#bdbdbd"
            }]
        },
        {
            "featureType": "poi.park",
            "elementType": "labels.text.fill",
            "stylers": [{
                "color": "#737373"
            }]
        },
        {
            "featureType": "poi.place_of_worship",
            "elementType": "labels.icon",
            "stylers": [{
                "color": "#bdbdbd"
            }]
        },
        {
            "featureType": "poi.place_of_worship",
            "elementType": "labels.text",
            "stylers": [{
                "visibility": "simplified"
            }]
        },
        {
            "featureType": "poi.place_of_worship",
            "elementType": "labels.text.fill",
            "stylers": [{
                "color": "#737373"
            }]
        },
        {
            "featureType": "poi.school",
            "elementType": "labels.icon",
            "stylers": [{
                "color": "#bdbdbd"
            }]
        },
        {
            "featureType": "poi.school",
            "elementType": "labels.text.fill",
            "stylers": [{
                "color": "#737373"
            }]
        },
        {
            "featureType": "poi.sports_complex",
            "elementType": "labels.icon",
            "stylers": [{
                "color": "#bdbdbd"
            }]
        },
        {
            "featureType": "poi.sports_complex",
            "elementType": "labels.text",
            "stylers": [{
                "visibility": "simplified"
            }]
        },
        {
            "featureType": "poi.sports_complex",
            "elementType": "labels.text.fill",
            "stylers": [{
                "color": "#737373"
            }]
        },
        {
            "featureType": "road.highway",
            "stylers": [{
                "color": "#d1dbff"
            }]
        },
        {
            "featureType": "transit.station",
            "elementType": "labels.icon",
            "stylers": [{
                "color": "#bdbdbd"
            }]
        },
        {
            "featureType": "transit.station",
            "elementType": "labels.text.fill",
            "stylers": [{
                "color": "#8f8f8f"
            }]
        }
    ]

</script>
