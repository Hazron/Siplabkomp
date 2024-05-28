@include('admin.layout.head')
<div class="container-scroller">
    @include('admin.layout.navbar')
    <div class="container-fluid page-body-wrapper">
        @include('admin.layout.sidebar')
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="row justify-content-center">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                        <div id="wrapper">
                            <div id="dialog">
                                <h3>Masukkan kode pengambilan kunci ruang</h3>
                                <div id="form">
                                    <input type="text" maxLength="1" size="1" min="0" max="9"
                                        pattern="[0-9]{1}" />
                                    <input type="text" maxLength="1" size="1" min="0" max="9"
                                        pattern="[0-9]{1}" /><input type="text" maxLength="1" size="1"
                                        min="0" max="9" pattern="[0-9]{1}" /><input type="text"
                                        maxLength="1" size="1" min="0" max="9"
                                        pattern="[0-9]{1}" />
                                    <button class="btn btn-primary btn-embossed" id="konfirm">Verify</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Fixed header table-->
                    <div class="table-responsive">
                        <table class="table table-fixed">
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
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama</th>
                                        <th>NIM</th>
                                        <th>Kelas</th>
                                        <th>Mata Kuliah</th>
                                        <th>Jam Pengambilan</th>
                                        <th>Jam Pengembalian</th>
                                        <th>status</th>
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
                    <!-- End -->
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const inputs = document.querySelectorAll("#form input");

        inputs.forEach(function(input, index) {
            input.addEventListener("input", function(event) {
                if (this.value.length === 1) {
                    if (index < inputs.length - 1) {
                        inputs[index + 1].focus();
                    }
                }
            });
            input.addEventListener("keypress", function(event) {
                const charCode = event.charCode;
                if (charCode < 48 || charCode > 57) {
                    event.preventDefault();
                }
            });
        });
    });
</script>
@include('admin.layout.footer')
