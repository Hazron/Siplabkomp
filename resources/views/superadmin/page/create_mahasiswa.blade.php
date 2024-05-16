@include('superadmin.layout.head')
<div class="container-scroller">
    @include('admin.layout.navbar')
    <div class="container-fluid page-body-wrapper">
        @include('superadmin.layout.sidebar')
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="d-flex justify-content-between mb-3">
                    <h3>Tambah Mahasiswa</h3>
                    <a href="{{ route('tabel_mhs.index') }}" class="btn btn-secondary">Kembali</a>
                </div>
                <div class="row justify-content-center">
                    <div class="col-12">
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        <form action="{{ route('tabel_mhs.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                            <div class="mb-3">
                                <label for="nim" class="form-label">NIM</label>
                                <input type="text" class="form-control" id="nim" name="nim" required>
                            </div>
                            <div class="mb-3">
                                <label for="program_studi" class="form-label">Program Studi</label>
                                <input type="text" class="form-control" id="program_studi" name="program_studi" required>
                            </div>
                            <div class="mb-3">
                                <label for="kelas" class="form-label">Kelas</label>
                                <input type="text" class="form-control" id="kelas" name="kelas" required>
                            </div>
                            <div class="mb-3">
                                <label for="angkatan" class="form-label">Angkatan</label>
                                <input type="number" class="form-control" id="angkatan" name="angkatan" required>
                            </div>
                            <div class="mb-3">
                                <label for="nomor_hp" class="form-label">Nomor Telepon</label>
                                <input type="text" class="form-control" id="nomor_hp" name="nomor_hp" placeholder="dapat terhubung ke whatsapp" required>
                            </div>
                            <div class="mb-3">
                                <label for="fotoprofile" class="form-label">Foto Profile</label>
                                <input type="file" class="form-control" id="fotoprofile" name="fotoprofile" required>
                            </div>
                            <div class="mt-4 h5">Akun untuk login</div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="text" class="form-control" id="password" name="password" placeholder="digunakan saat login, harap memasukkan dengan benar dan mengingatnya" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('admin.layout.footer')
