<!-- [ stiped-table ] start -->
<div class="col-xl-12">
    <div class="card">
        <div class="card-header">
            <div class="float-left">
                <h5>Tabel Pengguna</h5>
                <span class="d-block m-t-5">Daftar akun pengguna</span>
            </div>
            <a href="/user/create" class="btn btn-success mb-3 float-right"><i class="feather icon-plus-square"></i> Tambah Pengguna</a>
        </div>
        <div class="card-body table-border-style">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Pengguna</th>
                            <th>Email</th>
                            <th>Level</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $user->name}}</td>
                                <td>{{ $user->email}}</td>
                                <td>{{ $user->role}}</td>
                                <td>
                                    <form action="{{ route('user.destroy', $user->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button onclick="return confirm('apakah yakin ingin menghapus {{ $user->name}}')" class="badge badge-danger border-0" data-toggle="tooltip" data-placement="top" title="hapus">
                                            <i class="feather icon-x-circle"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- [ stiped-table ] end -->
