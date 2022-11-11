@extends('admin.layout')

@push('style')
    <style>
        img {
            width: 50%;
            height: 50%;
        }
    </style>
@endpush

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <a href="{{url('admin/bengkel')}}" class="btn btn-danger m-0">Kembali</a>
    <div>
        <button type="button" class="btn btn-primary edit-btn" data-toggle="modal" data-target="#editModal{{$bengkel->id}}">
            Edit
        </button>
    </div>
</div>
<div class="print-place">
    <div class="card w-100 mb-5" >
        <div class="card-body">
            <table class="table mb-0 table-bordered" width="100%">
                <tbody>
                    <tr>
                        <th scope="col">Nama Bengkel</th>
                        <td scope="col">{{ $bengkel->nama_bengkel }}</td>
                    </tr>
                    <tr>
                        <th scope="col">Nama Pemilik</th>
                        <td scope="col">{{ $bengkel->nama_pemilik }}</td>
                    <tr>
                        <th scope="col">Alamat</th>
                        <td scope="col">{{$bengkel->alamat}}</td>
                    </tr>
                    <tr>
                        <th scope="col">Keterangan</th>
                        <td scope="col">{{$bengkel->keterangan}}</td>
                    </tr>
                    <tr>
                        <th scope="col">Nomor Hp</th>
                        <td scope="col">{{$bengkel->nomor_hp}}</td>
                    </tr>
                    <tr>
                        <th scope="col">Foto</th>
                        <td scope="col"> <img src="{{ asset($bengkel->foto_bengkel)}}"></td>
                    </tr>
                    <tr>
                        <th scope="col">Titik Lokasi</th>
                        <td scope="col"> <div id="map"></div></td>
                    </tr>
                    <tr>
                        <th scope="col">Terima Tubles</th>
                        <td scope="col">
                            <div class="form-group mt-3">
                                <input type="checkbox" name="terima_tubles" class="tidak-berubah" {{  ($bengkel->terima_tubles == 1 ? ' checked' : '') }}>
                                <label for="terima_tubles" for="terima_tubles">{{  ($bengkel->terima_tubles == 1 ? ' Ya' : ' Tidak') }}</label>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th scope="col">Terima non Tubles</th>
                        <td scope="col">
                            <div class="form-group mt-3">
                                <input type="checkbox" name="terima_non_tubles" class="tidak-berubah" {{  ($bengkel->terima_non_tubles == 1 ? ' checked' : '') }}>
                                <label for="terima_non_tubles" for="terima_non_tubles">{{  ($bengkel->terima_non_tubles == 1 ? ' Ya' : ' Tidak') }}</label>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th scope="col">Terima Panggilan</th>
                        <td scope="col">
                            <div class="form-group mt-3">
                                <input type="checkbox" name="terima_panggilan" class="tidak-berubah" {{  ($bengkel->terima_panggilan == 1 ? ' checked' : '') }}>
                                <label for="terima_panggilan" for="terima_panggilan">{{  ($bengkel->terima_panggilan == 1 ? ' Ya' : ' Tidak') }}</label>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th scope="col">Terima Motor</th>
                        <td scope="col">
                            <div class="form-group mt-3">
                                <input type="checkbox" name="terima_motor" class="tidak-berubah" {{  ($bengkel->terima_motor == 1 ? ' checked' : '') }}>
                                <label for="terima_motor" for="terima_motor">{{  ($bengkel->terima_motor == 1 ? ' Ya' : ' Tidak') }}</label>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th scope="col">Terima Mobil</th>
                        <td scope="col">
                            <div class="form-group mt-3">
                                <input type="checkbox" name="terima_mobil" class="tidak-berubah" {{  ($bengkel->terima_mobil == 1 ? ' checked' : '') }}>
                                <label for="terima_mobil" for="terima_mobil">{{  ($bengkel->terima_mobil == 1 ? ' Ya' : ' Tidak') }}</label>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th scope="col">Terima Kendaraan Berat</th>
                        <td scope="col">
                            <div class="form-group mt-3">
                                <input type="checkbox" name="terima_kendaraan_berat" class="tidak-berubah" {{  ($bengkel->terima_kendaraan_berat == 1 ? ' checked' : '') }}>
                                <label for="terima_kendaraan_berat" for="terima_kendaraan_berat">{{  ($bengkel->terima_kendaraan_berat == 1 ? ' Ya' : ' Tidak') }}</label>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="editModal{{$bengkel->id}}" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <form action="{{url('admin/bengkel/'.$bengkel->id)}}" id="form-edit" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="addModalLabel">Edit Bengkel</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="number-input">Nama Bengkel</label>
                        <input type="text" required class="form-control" placeholder="Nama Bengkel" name="nama_bengkel" id="nama_bengkel" value="{{$bengkel->nama_bengkel}}">
                    </div>
                    <div class="form-group">
                        <label for="number-input">Nama Pemilik</label>
                        <input type="text" required class="form-control" placeholder="Nama Pemilik" name="nama_pemilik" id="nama_pemilik" value="{{$bengkel->nama_pemilik}}">
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea name="alamat" required class="form-control" placeholder="Tulis alamat lengkap ..." id="alamat"
                            rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Keterangan</label>
                        <textarea name="keterangan" required class="form-control" placeholder="Tulis keterangan ..." id="keterangan"
                            rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="number-input">Nomor Hp</label>
                        <input type="text" required class="form-control" placeholder="Nomor Hp" name="nomor_hp" id="nomor_hp" value="{{$bengkel->nomor_hp}}">
                    </div>
                    <div class="form-group">
                        <div class="card-body">
                            <input id="pac-input" class="form-control" type="text" placeholder="Cari tempat"/>
                        </div>
                        <div id="map2"></div>
                    </div>
                    <div class="d-flex mt-3">
                        <input type="text" class="form-control mr-1" placeholder="Latitude" name="latitude" id="latitude" value="{{$bengkel->latitude}}">
                        <input type="text" class="form-control ml-1" placeholder="Longitude" name="longitude" id="longitude" value="{{$bengkel->longitude}}">
                    </div>
                    <br>

                    <div class="form-group form-check">
                        <label for="number-input">Foto Bengkel</label>
                        <input type="file" name="foto_bengkel" class="dropify">
                    </div>

                    <div class="form-group form-check mt-3">
                        <input type="hidden" name="terima_tubles" value="{{$bengkel->terima_tubles}}"><input type="checkbox" onclick="this.previousSibling.value=1-this.previousSibling.value" {{  ($bengkel->terima_tubles == 1 ? ' checked' : '') }}>
                        <label for="terima_tubles" class="form-check-label">Terima Tubles</label>
                    </div>
                    <div class="form-group form-check">
                        <input type="hidden" name="terima_non_tubles" value="{{$bengkel->terima_non_tubles}}"><input type="checkbox" onclick="this.previousSibling.value=1-this.previousSibling.value" {{  ($bengkel->terima_non_tubles == 1 ? ' checked' : '') }}>
                        <label for="terima_non_tubles" class="form-check-label" for="terima_non_tubles">Terima non Tubles</label>
                    </div>
                    <div class="form-group form-check">
                        <input type="hidden" name="terima_panggilan" value="{{$bengkel->terima_panggilan}}"><input type="checkbox" onclick="this.previousSibling.value=1-this.previousSibling.value" {{  ($bengkel->terima_panggilan == 1 ? ' checked' : '') }}>
                        <label for="terima_panggilan" class="form-check-label" for="terima_panggilan">Terima Panggilan</label>
                    </div>
                    <div class="form-group form-check">
                        <input type="hidden" name="terima_motor" value="{{$bengkel->terima_motor}}"><input type="checkbox" onclick="this.previousSibling.value=1-this.previousSibling.value" {{  ($bengkel->terima_motor == 1 ? ' checked' : '') }}>
                        <label for="terima_motor" class="form-check-label" for="terima_motor">Terima Motor</label>
                    </div>
                    <div class="form-group form-check">
                        <input type="hidden" name="terima_mobil" value="{{$bengkel->terima_mobil}}"><input type="checkbox" onclick="this.previousSibling.value=1-this.previousSibling.value" {{  ($bengkel->terima_mobil == 1 ? ' checked' : '') }}>
                        <label for="terima_mobil" class="form-check-label" for="terima_mobil">Terima Mobil</label>
                    </div>
                    <div class="form-group form-check">
                        <input type="hidden" name="terima_kendaraan_berat" value="{{$bengkel->terima_kendaraan_berat}}"><input type="checkbox" onclick="this.previousSibling.value=1-this.previousSibling.value" {{  ($bengkel->terima_kendaraan_berat == 1 ? ' checked' : '') }}>
                        <label for="terima_kendaraan_berat" class="form-check-label" for="terima_kendaraan_berat">Terima Kendaraan Berat</label>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary btn-simpan">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@push('script')
<script>
    var data_unit = <?php echo json_encode($bengkel)?>;

    $(document).ready(function() {
        $('.dropify').dropify();

        $('.tidak-berubah').click(function () {
            return false;
        });

        $('#form-edit').find('textarea[name="alamat"]').val(data_unit.alamat);
        $('#form-edit').find('textarea[name="keterangan"]').val(data_unit.keterangan);

        $('.btn-simpan').click(function() {
            $.blockUI({
                message:
                '<div class="d-flex justify-content-center align-items-center"><p class="mr-50 mb-0">Mohon Tunggu...</p> <div class="spinner-grow spinner-grow-sm text-white" role="status"></div> </div>',
                css: {
                backgroundColor: 'transparent',
                color: '#fff',
                border: '0'
                },
                overlayCSS: {
                opacity: 0.5
                },
                timeout: 1000,
                baseZ: 2000
            });
        });
    });

    var map;
    var map2;
    var marker;
    var marker2;

    function initialize() {
        const myLatlng = { lat: parseFloat(data_unit.latitude), lng: parseFloat(data_unit.longitude) };

        const myOptions = {
          zoom: 14,
          center: myLatlng,
          mapTypeId: google.maps.MapTypeId.ROADMAP,
          disableDefaultUI: true
        };

        map = new google.maps.Map(document.getElementById("map"), myOptions);
        map2 = new google.maps.Map(document.getElementById("map2"), myOptions);

        marker = new google.maps.Marker({
            position: myLatlng,
            map: map,
            draggable: true,
            clickable: true
        });

        marker2 = new google.maps.Marker({
           position: myLatlng,
           map: map2,
           draggable: true,
           clickable: true
        });

        let node = {};

        map2.addListener("click", (mapsMouseEvent) => {
            if (marker2 && marker2.setMap) {
                marker2.setMap(null);
            }

            marker2 = new google.maps.Marker({
              position: mapsMouseEvent.latLng,
              map: map2,
              animation: google.maps.Animation.DROP,
            });

            node = mapsMouseEvent.latLng.toJSON()

            $('#latitude').val(node.lat);
            $('#longitude').val(node.lng);

            marker2.open(map2);
        });

        const input = document.getElementById("pac-input");
        var searchBox = new google.maps.places.SearchBox(input);

        map2.controls[google.maps.ControlPosition.TOP_CENTER].push(input);

        const options = {
            componentRestrictions: {
                country: "id"
            },
            fields: ["address_components", "geometry", "name"],
            strictBounds: false,
            types: ["establishment"],
        };

        const autocomplete = new google.maps.places.Autocomplete(input, options);

        autocomplete.addListener("place_changed", () => {
            const place = autocomplete.getPlace();
            if (!place.geometry) {
                return;
            }

            if (place.geometry.viewport) {
                map2.fitBounds(place.geometry.viewport);
                map2.setZoom(14);
            } else {
                map2.setCenter(place.geometry.location);
                map2.setZoom(14);
            }

            node = place.geometry.location;
            $('#latitude').val(node.lat);
            $('#longitude').val(node.lng);

            marker2.setPosition(place.geometry.location);
            marker2.setVisible(true);
        });

        marker2.setMap(map2);
        autocomplete.bindTo("bounds", map2);
    };

</script>

<script defer src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&libraries=places&callback=initialize"></script>

@endpush

