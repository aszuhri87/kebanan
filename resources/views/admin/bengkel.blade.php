@extends('admin.layout')

@section('content')

<div class="card w-100 mb-5">
    <div class="card-body">
        <div class="d-flex justify-content-between mb-3">
            <h5>Daftar Bengkel</h5>
            <div>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addModal">
                    Tambah
                </button>
            </div>
        </div>
        <table class="table mb-0 table-bordered" width="100%">
            <thead>
                <tr>
                    <th scope="col" class="text-center">#</th>
                    <th scope="col">Nama Bengkel</th>
                    <th scope="col" class="text-center">Nama Pemilik</th>
                    <th scope="col" class="text-center">Alamat</th>
                    <th scope="col" class="text-center">Nomor Hp</th>
                    <th scope="col" class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($list as $index => $item)
                <tr>
                    <th scope="row" class="text-center">{{$index + 1}}</th>
                    <td>{{$item->nama_bengkel}}</td>
                    <td class="text-center">{{$item->nama_pemilik}}</td>
                    <td class="text-center">{{$item->alamat}}</td>
                    <td class="text-center">{{$item->nomor_hp}}</td>
                    <td class="text-center">
                        <a class="btn btn-success m-0"
                            href="{{url('/admin/bengkel/'.$item->id)}}">Detail</a>
                        <a class="btn btn-danger m-0" href="{{url('/admin/bengkel/delete/'.$item->id)}}" onclick="return confirm('Apakah kamu yakin ingin menghapus data ini?');">Hapus</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="mt-4 w-100">
            {{ $list->links() }}
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="{{url('admin/bengkel')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="addModalLabel">Tambah Bengkel</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="number-input">Nama Bengkel</label>
                        <input type="text" required class="form-control" placeholder="Nama Bengkel" name="nama_bengkel" id="nama_bengkel">
                    </div>
                    <div class="form-group">
                        <label for="number-input">Nama Pemilik</label>
                        <input type="text" required class="form-control" placeholder="Nama Pemilik" name="nama_pemilik" id="nama_pemilik">
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
                        <input type="text" required class="form-control" placeholder="Nomor Hp" name="nomor_hp" id="nomor_hp">
                    </div>
                    <div class="form-group">
                        <div id="map"></div>
                    </div>
                    <div class="d-flex mt-3">
                        <input type="text" class="form-control mr-1" placeholder="Latitude" name="latitude" id="latitude">
                        <input type="text" class="form-control ml-1" placeholder="Longitude" name="longitude" id="longitude">
                    </div>
                    <br>
                    <label for="number-input">Foto Bengkel</label>
                    <div class="custom-file mb-2">
                        <input type="file" name="foto_bengkel" class="dropify">
                    </div>
                    <div class="form-group form-check mt-3">
                        <input type="hidden" name="terima_tubles" value="0"><input type="checkbox" onclick="this.previousSibling.value=1-this.previousSibling.value">
                        <label for="terima_tubles" class="form-check-label" for="terima_tubles">Terima Tubles</label>
                    </div>

                    <div class="form-group form-check">
                        <input type="hidden" name="terima_non_tubles" value="0"><input type="checkbox" onclick="this.previousSibling.value=1-this.previousSibling.value">
                        <label for="terima_non_tubles" class="form-check-label" for="terima_non_tubles">Terima non Tubles</label>
                    </div>
                    <div class="form-group form-check">
                        <input type="hidden" name="terima_panggilan" value="0"><input type="checkbox" onclick="this.previousSibling.value=1-this.previousSibling.value">
                        <label for="terima_panggilan" class="form-check-label" for="terima_panggilan">Terima Panggilan</label>
                    </div>
                    <div class="form-group form-check">
                        <input type="hidden" name="terima_motor" value="0"><input type="checkbox" onclick="this.previousSibling.value=1-this.previousSibling.value">
                        <label for="terima_motor" class="form-check-label" for="terima_motor">Terima Motor</label>
                    </div>
                    <div class="form-group form-check">
                        <input type="hidden" name="terima_mobil" value="0"><input type="checkbox" onclick="this.previousSibling.value=1-this.previousSibling.value">
                        <label for="terima_mobil" class="form-check-label" for="terima_mobil">Terima Mobil</label>
                    </div>
                    <div class="form-group form-check">
                        <input type="hidden" name="terima_kendaraan_berat" value="0"><input type="checkbox" onclick="this.previousSibling.value=1-this.previousSibling.value">
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
    $(document).ready(function () {
        $('.dropify').dropify();

        $('.btn-simpan').click(function () {
            $.blockUI({
                message: '<div class="d-flex justify-content-center align-items-center"><p class="mr-50 mb-0">Mohon Tunggu...</p> <div class="spinner-grow spinner-grow-sm text-white" role="status"></div> </div>',
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

    function initialize() {
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
    }
</script>

<script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&libraries=places&callback=initialize" async defer></script>

@endpush
