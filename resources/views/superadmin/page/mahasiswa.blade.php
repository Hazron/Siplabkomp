<!-- resources/views/superadmin/page/mahasiswa.blade.php -->

@include('superadmin.layout.head')
<div class="container-scroller">
    @include('admin.layout.navbar')
    <div class="container-fluid page-body-wrapper">
        @include('superadmin.layout.sidebar')
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h3>Tabel Mahasiswa Ketua Kelas</h3>
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <a href="{{ route('tabel_mhs.create') }}" class="btn btn-primary mr-2">Tambah Manual</a>
                        <a href="#" class="btn btn-primary ml-2" data-bs-toggle="modal"
                            data-bs-target="#importModal">Import</a>

                    </div>
                </div>
                <div class="row justify-content-center">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <!-- Tabel Mahasiswa -->
                    <table class="table align-middle mb-0 bg-white">
                        <thead class="bg-light">
                            <tr>
                                <th>Name</th>
                                <th>NIM</th>
                                <th>Program Studi</th>
                                <th>Angkatan</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($mahasiswa as $user)
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img src="{{ asset('storage/' . $user->fotoprofile) }}" alt=""
                                                style="width: 45px; height: 45px" class="rounded-circle" />
                                            <div class="ms-3">
                                                <p class="fw-bold mb-1">{{ $user->name }}</p>
                                                <p class="text-muted mb-0">{{ $user->email }}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="fw-normal mb-1">{{ $user->nim }}</p>
                                    </td>
                                    <td>
                                        <p class="fw-normal mb-1">{{ $user->program_studi }}</p>
                                    </td>
                                    <td>
                                        <p class="fw-normal mb-1">{{ $user->kelas }}</p>
                                        <p class="text-muted mb-0">Angkatan {{ $user->angkatan }}</p>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-primary">Detail</button>
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

<!-- Modal untuk input file Excel tambah mahasiswa -->
<div class="modal fade" id="importModal" tabindex="-1" aria-labelledby="importModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="importModalLabel">Import Mahasiswa</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('mahasiswa.import') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="file" class="form-label">Pilih File Excel</label>
                        <input class="form-control" type="file" id="file" name="file" accept=".xlsx, .xls">
                    </div>
                    <div class="mb-3">
                        <label for="tahunakademik" class="form-label">Pilih Tahun Akademik</label>
                        <select class="form-control" id="tahunakademik" name="tahunakademik">
                            @foreach ($tahunakademik as $tahun)
                                <option value="{{ $tahun->tahun_akademik }}">{{ $tahun->tahun_akademik }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Import</button>
                </form>
            </div>
        </div>
    </div>
</div>
@include('admin.layout.footer')
