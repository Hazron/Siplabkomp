@include('superadmin.layout.head')
<div class="container-scroller">
    @include('admin.layout.navbar')
    <div class="container-fluid page-body-wrapper">
        @include('superadmin.layout.sidebar')
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="row mb-4">
                    <div class="col-lg-12">
                        <button type="button" class="btn btn-primary" data-toggle="modal"
                            data-target="#addTahunAkademikModal">
                            Tambah Tahun Akademik
                        </button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 grid-margin stretch-card">
                        <div class="card shadow-sm">
                            <div class="card-body">
                                <h4 class="card-title">Tahun Akademik</h4>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Nomor</th>
                                                <th>Tahun Akademik</th>
                                                <th>Jadwal Akademik</th>
                                                <th>Status</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($tahunAkademiks as $tahunAkademik)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $tahunAkademik->tahun_akademik }}</td>
                                                    <td>{{ $tahunAkademik->jadwal_akademik }}</td>
                                                    <td>
                                                        @if ($tahunAkademik->status == 'Complete')
                                                            <label
                                                                class="badge badge-danger">{{ $tahunAkademik->status }}</label>
                                                        @else
                                                            <label
                                                                class="badge badge-info">{{ $tahunAkademik->status }}</label>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <label class="badge badge-info">Edit</label>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-md-6 stretch-card grid-margin grid-margin-md-0">
                        <div class="card data-icon-card-primary">
                            <div class="card-body">
                                <p class="card-title text-white">Tahun Akademik</p>
                                <div class="row">
                                    <div class="col-8 text-white">
                                        <p class="text-white font-weight-500 mb-0">Tahun Akademik adalah kurun waktu
                                            pembelajaran pada Universitas Jambi.
                                            Setiap pergantian tahun ajaran akan terjadi reset kembali SipLabkomp mulai
                                            dari
                                            data mahasiswa hingga jadwal.
                                            <br><br>
                                            Dengan begitu harap mendata kembali mahasiswa sebagai PJ matakuliah dan
                                            Jadwal
                                            yang akan digunakan pada tahun ajaran tersebut
                                        </p>
                                    </div>
                                    <div class="col-4 background-icon">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="addTahunAkademikModal" tabindex="-1" role="dialog"
    aria-labelledby="addTahunAkademikModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addTahunAkademikModalLabel">Tambah Tahun Akademik</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('tahun_akademik.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="tahun_akademik">Nama Tahun Akademik</label>
                        <input type="text" class="form-control" id="tahun_akademik" name="tahun_akademik"
                            placeholder="genap/ganjil & tahun" required>
                    </div>
                    <div class="form-group">
                        <label for="jadwal_akademik">Jadwal Akademik</label>
                        <input type="date" class="form-control" id="jadwal_akademik" name="jadwal_akademik" required>
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select class="form-control" id="status" name="status" required>
                            <option value="Active">Active</option>
                            <option value="Inactive">Inactive</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
@if (session('success'))
    <div class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
@endif

@if ($errors->any())
    <div class="alert alert-danger" role="alert">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@include('admin.layout.footer')
