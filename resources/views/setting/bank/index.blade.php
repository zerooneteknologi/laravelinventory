<!-- [ stiped-table ] start -->
<div class="col-xl-12">
    <div class="card">
        <div class="card-header">
            <div class="float-left">
                <h5>Tabel Akun Bank</h5>
                <span class="d-block m-t-5">Daftar Akun Bank</span>
            </div>
            <a href="/bank/create" class="btn btn-success mb-3 float-right"><i class="feather icon-plus-square"></i> Tambah Pengguna</a>
        </div>
        <div class="card-body table-border-style">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Bank</th>
                            <th>Akun pemilik</th>
                            <th>No Rekening</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($banks as $bank)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $bank->bankName}}</td>
                                <td>{{ $bank->acountBank}}</td>
                                <td>{{ $bank->noReck}}</td>
                                <td>
                                    <form action="{{ route('bank.destroy', $bank->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button onclick="return confirm('apakah yakin ingin menghapus {{ $bank->name}}')" class="badge badge-danger border-0" data-toggle="tooltip" data-placement="top" title="hapus">
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
