
window.onload = function() {
    const myLatlng = { lat: -7.801494832202592, lng: 110.36474864359786 };

      const map = new google.maps.Map(document.getElementById("map"), {
        zoom: 10,
        center: myLatlng,
        disableDefaultUI: true
      });

      var marker = new google.maps.Marker({
        position: myLatlng,
        map: map,
        draggable: true,
        clickable: true
     });

      let node = {};
      map.addListener("click", (mapsMouseEvent) => {

        if (marker && marker.setMap) {
            marker.setMap(null);
        }

        marker = new google.maps.Marker({
          position: mapsMouseEvent.latLng,
          map: map,
          animation: google.maps.Animation.DROP,
        });

        node = mapsMouseEvent.latLng.toJSON()

        $('#latitude').val(node.lat);
        $('#longitude').val(node.lng);

        marker.open(map);
    });

};
