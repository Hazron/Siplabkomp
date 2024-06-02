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
                                    <h3>Masukkan kode pengambilan kunci ruang</h3>
                                    <div id="form">
                                        <form action="{{ route('kodepinjam') }}" method="POST" class="d-inline-block">
                                            @csrf
                                            <div id="inputs" class="inputs">
                                                <input class="input" type="text" inputmode="numeric" maxlength="1" />
                                                <input class="input" type="text" inputmode="numeric" maxlength="1" />
                                                <input class="input" type="text" inputmode="numeric" maxlength="1" />
                                                <input class="input" type="text" inputmode="numeric" maxlength="1" />
                                            </div>
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
                                                    <td>{{ $riwayat->jam_pengambilan }}</td>
                                                    <td>{{ $riwayat->jam_pengembalian }}</td>
                                                    <td>{{ $riwayat->status }}</td>
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
        const inputs = document.getElementById("inputs");

        inputs.addEventListener("input", function(e) {
            const target = e.target;
            const val = target.value;

            if (isNaN(val)) {
                target.value = "";
                return;
            }

            if (val != "") {
                const next = target.nextElementSibling;
                if (next) {
                    next.focus();
                }
            }
        });

        inputs.addEventListener("keyup", function(e) {
            const target = e.target;
            const key = e.key.toLowerCase();

            if (key == "backspace" || key == "delete") {
                target.value = "";
                const prev = target.previousElementSibling;
                if (prev) {
                    prev.focus();
                }
                return;
            }
        });
    </script>
    @include('admin.layout.footer')
