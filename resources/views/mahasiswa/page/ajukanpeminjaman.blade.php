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
                                <h4>Jadwal Name</h4>
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
                                                        'senin' => 1,
                                                        'selasa' => 2,
                                                        'rabu' => 3,
                                                        'kamis' => 4,
                                                        'jumat' => 5,
                                                        'sabtu' => 6,
                                                        'minggu' => 7,
                                                    ];
                                                    $hariIni = date('N');

                                                    $tombolAjukan = $angkaHari[$namaHari] == $hariIni;
                                                @endphp

                                                @if ($tombolAjukan)
                                                    <button type="button" class="btn btn-secondary">Ajukan</button>
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

@include('mahasiswa.layout.footer')
