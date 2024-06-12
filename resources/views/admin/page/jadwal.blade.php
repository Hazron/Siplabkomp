@include('admin.layout.head')
<div class="container-scroller">
    @include('admin.layout.navbar')
    <div class="container-fluid page-body-wrapper">
        @include('admin.layout.sidebar')
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="row mb-4">
                    <div class="col-lg-12">
                        <div class="mb-3" style="width: 200px;">
                            <label for="ruang" class="form-label">Pilih Ruangan:</label>
                            <select class="form-select form-select-sm" id="ruang" style="font-size: 12px;">
                                <option selected value="">Tampilkan Semua...</option>
                                @foreach ($ruangs as $ruang)
                                    <option value="{{ $ruang->id_ruang }}"
                                        {{ $ruang->id_ruang == 1 ? 'selected' : '' }}>
                                        {{ $ruang->nama_lab }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 grid-margin stretch-card">
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
                        <div class="card shadow-sm">
                            <div class="card-body">
                                <h4 class="card-title">Jadwal Perkuliahan</h4>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Hari</th>
                                                <th>Mata Kuliah</th>
                                                <th>Jam Mulai & Jam Selesai</th>
                                                <th>Kelas</th>
                                                <th>Ruang</th>
                                                <th>Penanggung Jawab</th>
                                            </tr>
                                        </thead>
                                        <tbody id="jadwal-table-body">
                                            @foreach ($jadwals as $index => $jadwal)
                                                @php
                                                    \Carbon\Carbon::setLocale('id');
                                                    $hari = \Carbon\Carbon::parse($jadwal->hari)->translatedFormat('l');
                                                @endphp
                                                <tr data-room-id="{{ $jadwal->ruang_id }}">
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $hari }}</td>
                                                    <td>{{ $jadwal->matakuliah }}</td>
                                                    <td></td>
                                                    <td>{{ $jadwal->kelas }}</td>
                                                    <td>{{ $jadwal->ruang->nama_lab ?? 'Tidak Ada' }}</td>
                                                    <td>{{ $jadwal->user->name ?? 'Tidak Ada' }}</td>
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
                                            Jadwal yang akan digunakan pada tahun ajaran tersebut dan yang ada di
                                            Fakultas sains dan teknologi Universitas Jambi terkhusus di Lab ICT 1, 2 dan
                                            Komputasi Sains.
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
                            <option value="">Pilih Penanggung Jawab Kelas</option>
                            @foreach ($mahasiswa as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}
                                    {{ $user->angkatan }}/{{ $user->kelas }}</option>
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

<script>
    document.getElementById('ruang').addEventListener('change', function() {
        const roomId = this.value;
        const rows = document.querySelectorAll('#jadwal-table-body tr');

        rows.forEach(row => {
            if (roomId === "" || row.getAttribute('data-room-id') === roomId) {
                row.style.display = "";
            } else {
                row.style.display = "none";
            }
        });
    });
</script>


@include('admin.layout.footer')
