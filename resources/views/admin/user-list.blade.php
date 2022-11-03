@extends('admin.layout')

@section('content')

<div class="card w-100 mb-5">
    <div class="card-body">
        <div class="d-flex justify-content-between mb-3">
            <h5>Daftar Admin</h5>
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
                    <th width="50%" scope="col">Nama</th>
                    <th width="40%" scope="col" class="text-center">Email</th>
                    <th width="10%" scope="col" class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($list as $index => $item)
                @if (Auth::guard('admin')->user()->nama == 'Admin')
                <tr>
                    <th scope="row" class="text-center">{{$index + 1}}</th>
                    <td>{{$item->nama}}</td>
                    <td class="text-center">{{$item->email}}</td>
                    <td class="text-center">
                        <a class="btn btn-success m-0"
                            href="{{url('/admin/user/'.$item->id)}}">Detail</a>
                    </td>
                </tr>
                @else
                    @if ($item->nama != 'Admin')
                    <tr>
                        <th scope="row" class="text-center">{{$index + 1}}</th>
                        <td>{{$item->nama}}</td>
                        <td class="text-center">{{$item->email}}</td>
                        <td class="text-center">
                            <a class="btn btn-success m-0"
                                href="{{url('/admin/user/'.$item->id)}}">Detail</a>
                        </td>
                    </tr>
                    @endif
                @endif
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
            <form action="{{url('admin/user/')}}" method="post">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="addModalLabel">Tambah Admin</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="number-input">Nama</label>
                        <input type="text" required class="form-control" placeholder="Nama" name="nama" id="nama">
                    </div>
                    <div class="form-group">
                        <label for="phone_number">Email</label>
                        <input type="email" required class="form-control" placeholder="Email" name="email"
                            id="email">
                    </div>
                    <div class="form-group">
                        <label for="phone_number">Password</label>
                        <input type="password" required class="form-control" placeholder="Password" name="password"
                            id="password">
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

</script>
@endpush
