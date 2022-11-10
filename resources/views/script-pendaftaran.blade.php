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
            radius: 500,
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

        let node = {};

        map.addListener("click", (mapsMouseEvent) => {
            if (myMarker && myMarker.setMap) {
                myMarker.setMap(null);
            }

            if (myCircle && myCircle.setMap) {
                myCircle.setMap(null);
            }

            myMarker = new google.maps.Marker({
              position: mapsMouseEvent.latLng,
              map: map,
              icon: './images/pin.svg',
            });

            myCircle = new google.maps.Circle({
                center: mapsMouseEvent.latLng,
                radius: 500,
                map: map,
                strokeColor: "rgba(0,0,0,0)",
                fillColor: "#019444",
                fillOpacity: 0.2
            });

            node = mapsMouseEvent.latLng.toJSON()

            $('#latitude').val(node.lat);
            $('#longitude').val(node.lng);

            myMarker.open(map);

        });

        // use methods
        myMarker.setMap(map);
        myCircle.setMap(map);
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
