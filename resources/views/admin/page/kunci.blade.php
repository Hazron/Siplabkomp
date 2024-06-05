@section('content')
    @include('admin.layout.head')
    <div class="container-scroller">
        @include('admin.layout.navbar')
        <div class="container-fluid page-body-wrapper">
            @include('admin.layout.sidebar')
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="row justify-content-center">
                        <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                            <div id="wrapper" class="text-center">
                                <div id="dialog">
                                    @if (session('success'))
                                        <div class="alert alert-success">
                                            {{ session('success') }}
                                        </div>
                                    @endif

                                    @if (session('error'))
                                        <div class="alert alert-danger">
                                            {{ session('error') }}
                                        </div>
                                    @endif
                                    <h3>Masukkan kode pengambilan kunci ruang</h3>
                                    <div id="form">
                                        <form action="{{ route('kodepinjam') }}" method="POST" id="kode_pinjam_form"
                                            class="d-inline-block" onsubmit="return gabungkanKode()">
                                            @csrf
                                            <div id="inputs" class="inputs">
                                                <input class="input" type="text" inputmode="numeric" maxlength="1"
                                                    name="digit_1" required>
                                                <input class="input" type="text" inputmode="numeric" maxlength="1"
                                                    name="digit_2" required>
                                                <input class="input" type="text" inputmode="numeric" maxlength="1"
                                                    name="digit_3" required>
                                                <input class="input" type="text" inputmode="numeric" maxlength="1"
                                                    name="digit_4" required>
                                            </div>
                                            <input type="hidden" id="kode_pinjam" name="kode_pinjam">
                                            <button type="submit" class="btn btn-primary btn-embossed mt-3"
                                                id="konfirm">Verify</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Fixed header table-->
                        <div class="col-12 mt-5">
                            <div class="table-responsive">
                                @php
                                    $daysTranslation = [
                                        'Monday' => 'Senin',
                                        'Tuesday' => 'Selasa',
                                        'Wednesday' => 'Rabu',
                                        'Thursday' => 'Kamis',
                                        'Friday' => 'Jumat',
                                        'Saturday' => 'Sabtu',
                                        'Sunday' => 'Minggu',
                                    ];
                                @endphp
                                @foreach ($groupedRiwayat as $day => $riwayatGroup)
                                    <h4>Riwayat Peminjaman Per Hari {{ $daysTranslation[$day] }}</h4>
                                    <table class="table table-fixed">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Nama</th>
                                                <th>NIM</th>
                                                <th>Kelas</th>
                                                <th>Mata Kuliah</th>
                                                <th>Jam Pengambilan</th>
                                                <th>Jam Pengembalian</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($riwayatGroup as $index => $riwayat)
                                                <tr>
                                                    <td>{{ $index + 1 }}</td>
                                                    <td>{{ $riwayat->user->name }}</td>
                                                    <td>{{ $riwayat->user->nim }}</td>
                                                    <td>{{ $riwayat->jadwal->ruang->nama_lab }}</td>
                                                    <td>{{ $riwayat->jadwal->matakuliah }}</td>
                                                    <td>{{ $riwayat->jam_pengambilan ? \Carbon\Carbon::parse($riwayat->jam_pengambilan)->format('H:i') : '-' }}
                                                    </td>
                                                    <td>{{ $riwayat->jam_pengembalian ? \Carbon\Carbon::parse($riwayat->jam_pengembalian)->format('H:i') : '-' }}
                                                    </td>
                                                    </td>
                                                    <td>
                                                        @if ($riwayat->status == 'sedang digunakan')
                                                            <form id="selesaikan-form-{{ $riwayat->id_riwayat }}"
                                                                action="{{ route('selesaikan', $riwayat->id_riwayat) }}"
                                                                method="POST">
                                                                @csrf
                                                                <button type="button"
                                                                    onclick="confirmSelesai({{ $riwayat->id_riwayat }})"
                                                                    class="btn btn-danger">Selesai</button>
                                                            </form>
                                                        @else
                                                            {{ $riwayat->status }}
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                @endforeach
                            </div>
                        </div>
                        <!-- End -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function gabungkanKode() {
            const digit1 = document.querySelector('input[name="digit_1"]').value;
            const digit2 = document.querySelector('input[name="digit_2"]').value;
            const digit3 = document.querySelector('input[name="digit_3"]').value;
            const digit4 = document.querySelector('input[name="digit_4"]').value;

            const kodePinjam = digit1 + digit2 + digit3 + digit4;
            if (kodePinjam.length !== 4) {
                alert('Kode pinjam harus terdiri dari 4 digit.');
                return false;
            }

            console.log('Kode Pinjam: ' + kodePinjam); // Tambahkan log ini untuk debugging

            document.getElementById('kode_pinjam').value = kodePinjam;
            return true;
        }

        const inputs = document.querySelectorAll('.input');
        inputs.forEach((input, index) => {
            input.addEventListener('input', () => {
                if (input.value.length === 1 && index < inputs.length - 1) {
                    inputs[index + 1].focus();
                }
            });
        });
    </script>
    <script>
        function confirmSelesai(id) {
            Swal.fire({
                title: 'Konfirmasi',
                text: 'Pastikan ruang lab telah terkunci dan semua alat elektronik dimatikan. Apakah Anda yakin ingin menyelesaikan peminjaman ini?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, Selesai!'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('selesaikan-form-' + id).submit();
                }
            });
        }
    </script>

    @include('admin.layout.footer')
