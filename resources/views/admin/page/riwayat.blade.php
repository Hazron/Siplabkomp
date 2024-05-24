@include('admin.layout.head')
<div class="container-scroller">
    @include('admin.layout.navbar')
    <div class="container-fluid page-body-wrapper">
        @include('admin.layout.sidebar')
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="row justify-content-center">
                    <!-- Fixed header table-->
                    <div class="table-responsive">
                        <table class="table table-fixed">
                            <h3>Riwayat Peminjaman</h3>
                            <div class="mb-3 d-flex justify-content-between align-items-center">
                                <div style="width: 200px;">
                                    <label for="ruang" class="form-label">berdasarkan:</label>
                                    <select class="form-select form-select-sm" id="ruang" style="font-size: 12px;">
                                        <option value="Per Hari" selected>Perhari</option>
                                        <option value="PerMinggu">Perminggu</option>
                                        <option value="PerBulan">Perbulan</option>
                                        <option value="Per Semester">Per Semester</option>
                                    </select>
                                </div>
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a href="#" class="btn btn-primary">Export Excel</a>
                                </div>
                            </div>
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama</th>
                                    <th>NIM</th>
                                    <th>Kelas</th>
                                    <th>Mata Kuliah</th>
                                    <th>Jam Pengambilan</th>
                                    <th>Jam Pengembalian</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- RIWAYAT BODY -->

                            </tbody>
                        </table>
                    </div>
                    <!-- End -->
                </div>
            </div>
        </div>
    </div>
</div>

@include('admin.layout.footer')
