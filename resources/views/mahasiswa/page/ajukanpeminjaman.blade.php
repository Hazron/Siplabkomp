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
                                <h4>Ajukan Perkuliahan anda</h4>
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
                                    @foreach ($riwayatPinjams as $riwayatPinjam)
                                        <tr>
                                            <td hidden>{{ $riwayatPinjam->id_riwayat }}</td>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $riwayatPinjam->jadwal->hari }}</td>
                                            <td>{{ $riwayatPinjam->jadwal->ruang->nama_lab }}</td>
                                            <td>{{ $riwayatPinjam->jadwal->matakuliah }}</td>
                                            <td>{{ $riwayatPinjam->jadwal->jam_mulai }}</td>
                                            <td>{{ $riwayatPinjam->jadwal->jam_selesai }}</td>
                                            <td>
                                                @if ($riwayatPinjam->status === 'menunggu konfirmasi')
                                                    <button type="button" class="btn btn-secondary btn-ajukan"
                                                        data-toggle="modal" data-target="#ajukanModal"
                                                        data-jadwal-id="{{ $riwayatPinjam->id_riwayat }}">
                                                        Ajukan
                                                    </button>
                                                @elseif ($riwayatPinjam->status === 'akan digunakan')
                                                    <span>Kode Pinjam: {{ $riwayatPinjam->kode_pinjam }}</span>
                                                @elseif ($riwayatPinjam->status === 'kosong')
                                                    <span>Ruang Kosong</span>
                                                @endif

                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
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
                <h4>Ketentuan Peminjaman Ruang</h4>
                <p>Ruang hanya dapat dipinjam pada hari yang sama dengan jadwal perkuliahan yang tercantum.</p>
                <p>Peminjaman ruang hanya diperbolehkan pada jam yang tersedia.</p>
                <p>Pemakaian ruang harus sesuai dengan peraturan yang berlaku.</p>

                <h4>Pilih Status Ruang</h4>
                <form id="ajukanForm" action="{{ route('ajukan.peminjaman') }}" method="POST">
                    @csrf
                    <input type="hidden" name="id_riwayat" id="id_riwayat">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="status" id="ruangKosong" value="kosong"
                            checked>
                        <label class="form-check-label" for="ruangKosong">Ruang Kosong</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="status" id="ruangDigunakan"
                            value="akan digunakan">
                        <label class="form-check-label" for="ruangDigunakan">Akan Digunakan</label>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary" form="ajukanForm">Ajukan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@include('mahasiswa.layout.footer')

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var ajukanButtons = document.querySelectorAll('.btn-ajukan');
        ajukanButtons.forEach(function(button) {
            button.addEventListener('click', function() {
                var jadwalId = button.getAttribute('data-jadwal-id');
                document.getElementById('id_riwayat').value = jadwalId;
            });
        });
    });
</script>
