@include('mahasiswa.layout.head')
<div class="container-scroller">
    @include('mahasiswa.layout.navbar')
    <div class="container-fluid page-body-wrapper">
        @include('mahasiswa.layout.sidebar')
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="row">
                    <!-- MAIN -->
                    @if (Auth::check())
                        <div class="d-flex align-items-center">
                            <img src="https://mdbootstrap.com/img/new/avatars/8.jpg" alt=""
                                style="width: 200px; height: 200px" class="rounded-circle" />
                            <div class="ms-3">
                                <ul class="list-unstyled">
                                    <li class="h2">{{ Auth::user()->name }}</li>
                                    <ul>
                                        <li>Angkatan: {{ Auth::user()->angkatan }}</li>
                                        <li>Ruang: {{ Auth::user()->kelas }}</li>
                                        <li>Program Studi: {{ Auth::user()->program_studi }}</li>
                                    </ul>
                                </ul>
                            </div>
                        </div>
                        <div class="table-responsive mt-3">
                            <table class="table table-fixed">
                                <h4>Jadwal Perkuliahan anda</h4>
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Hari</th>
                                        <th>Ruang</th>
                                        <th>Mata Kuliah</th>
                                        <th>Jam Mulai</th>
                                        <th>Jam Selesai</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($jadwals as $jadwal)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $jadwal->hari }}</td>
                                            <td>{{ $jadwal->ruang->nama_lab }}</td>
                                            <td>{{ $jadwal->matakuliah }}</td>
                                            <td>{{ $jadwal->jam_mulai }}</td>
                                            <td>{{ $jadwal->jam_selesai }}</td>
                                            <td>
                                                @php
                                                    $namaHari = strtolower($jadwal->hari);
                                                    $angkaHari = [
                                                        'monday' => 1,
                                                        'tuesday' => 2,
                                                        'wednesday' => 3,
                                                        'thursday' => 4,
                                                        'friday' => 5,
                                                        'saturday' => 6,
                                                        'sunday' => 7,
                                                    ];

                                                    $hariIni = date('N');

                                                    $tombolAjukan = $angkaHari[$namaHari] == $hariIni;
                                                @endphp

                                                @if ($tombolAjukan)
                                                    <button type="button" class="btn btn-secondary" data-toggle="modal"
                                                        data-target="#ajukanModal">
                                                        Ajukan
                                                    </button>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    @endif
                    <!-- End -->
                </div>
            </div>
        </div>
    </div>
</div>

<!-- MODAL PINJAM -->
<!-- Modal -->
<div class="modal fade" id="ajukanModal" tabindex="-1" role="dialog" aria-labelledby="ajukanModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ajukanModalLabel">Ajukan Peminjaman Ruang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Ketentuan peminjaman ruang:</p>
                <ul>
                    <li>Ruang hanya dapat dipinjam pada hari yang sama dengan jadwal perkuliahan yang tercantum.</li>
                    <li>Peminjaman ruang hanya diperbolehkan pada jam yang tersedia.</li>
                    <li>Pemakaian ruang harus sesuai dengan peraturan yang berlaku.</li>
                </ul>
                <p>Silakan pilih status ruang:</p>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="statusRuang" id="ruangKosong" value="kosong"
                        checked>
                    <label class="form-check-label" for="ruangKosong">
                        Kosong
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="statusRuang" id="ruangDigunakan"
                        value="digunakan">
                    <label class="form-check-label" for="ruangDigunakan">
                        Akan Digunakan
                    </label>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary">Ajukan</button>
            </div>
        </div>
    </div>
</div>

@include('mahasiswa.layout.footer')
