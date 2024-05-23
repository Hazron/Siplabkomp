@include('superadmin.layout.head')
<div class="container-scroller">
    @include('admin.layout.navbar')
    <div class="container-fluid page-body-wrapper">
        @include('superadmin.layout.sidebar')
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="row mb-4">
                    <div class="col-lg-12">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addjadwalModal">
                            Import Data Jadwal
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
                                                <th>No</th>
                                                <th>Hari</th>
                                                <th>Mata Kuliah</th>
                                                <th>Program Studi</th>
                                                <th>Kelas</th>
                                                <th>Penanggung Jawab</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($jadwals as $jadwal)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $jadwal->hari }}</td>
                                                    <td>{{ $jadwal->matakuliah }}</td>
                                                    <td>{{ $jadwal->programstudi }}</td>
                                                    <td>{{ $jadwal->kelas }}</td>
                                                    <td>{{ $jadwal->user->name ?? 'Tidak Ada' }}</td>
                                                    <td>
                                                        <button class="btn btn-info btn-sm" data-toggle="modal"
                                                            data-target="#editJadwalModal"
                                                            data-id="{{ $jadwal->id_jadwal }}">Edit</button>
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
                                <p class="card-title text-white">Jadwal Perkuliahan</p>
                                <div class="row">
                                    <div class="col-8 text-white">
                                        <p class="text-white font-weight-500 mb-0">Jadwal Perkuliahan berdasarkan Siakad
                                            Universitas Jambi.
                                            <br><br>
                                            Dengan begitu harap mendata kembali mahasiswa sebagai PJ matakuliah dan
                                            Jadwal yang akan digunakan pada tahun ajaran tersebut.
                                        </p>
                                    </div>
                                    <div class="col-4 background-icon">
                                        <!-- Ikon atau konten tambahan -->
                                    </div>
                                </div>
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
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="addjadwalModal" tabindex="-1" role="dialog" aria-labelledby="addjadwalModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addjadwalModalLabel">Import Excel Jadwal Perkuliahan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @if ($tahunAkademiks->isEmpty())
                    <p>Tahun akademik kosong, harap input terlebih dahulu.</p>
                @else
                    <form action="{{ route('jadwal.import') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="academicYear">Tahun Akademik</label>
                            <select class="form-control" id="tahunakademik" name="tahunakademik">
                                <option value="">Pilih Tahun Akademik</option>
                                @foreach ($tahunAkademiks as $tahunAkademik)
                                    <option value="{{ $tahunAkademik->id }}">{{ $tahunAkademik->tahun_akademik }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="ruang">Ruang</label>
                            <select class="form-control" id="ruang" name="ruang_id">
                                <option value="">Pilih Ruang</option>
                                <option value="1">ICT 1</option>
                                <option value="2">ICT 2</option>
                                <option value="3">Komputasi Sains</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="excelFile">File Excel</label>
                            <input type="file" class="form-control" id="excelFile" name="excelFile">
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                @endif
            </div>

        </div>
    </div>
</div>

<!-- Modal Edit Penanggung Jawab-->
<div class="modal fade" id="editJadwalModal" tabindex="-1" role="dialog" aria-labelledby="editJadwalModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editJadwalModalLabel">Edit Jadwal</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="editJadwalForm" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <input type="hidden" id="editJadwalId" name="id_jadwal">
                    <div class="form-group">
                        <label for="user_id">Penanggung Jawab <br>
                            @isset($jadwal->matakuliah)
                                {{ $jadwal->matakuliah }} <br>
                            @else
                                Matakuliah belum ditentukan <br>
                            @endisset

                            @isset($jadwal->kelas)
                                Semester. Kelas <br>
                                {{ $jadwal->kelas }}
                            @else
                                Kelas belum ditentukan
                            @endisset
                        </label>

                        <select class="form-control" id="user_id" name="user_id"
                            aria-placeholder="Pilih Penanggung Jawab Kelas">
                            @foreach ($mahasiswa as $user)
                                <option value="">Pilih Penanggung Jawab Kelas</option>

                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <!-- Tambahkan field lainnya yang perlu diedit -->
                    <!-- Misalnya: hari, jam_mulai, jam_selesai, dll. -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>


@include('admin.layout.footer')
