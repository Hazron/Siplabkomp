<!-- resources/views/superadmin/page/mahasiswa.blade.php -->

@include('superadmin.layout.head')
<div class="container-scroller">
    @include('admin.layout.navbar')
    <div class="container-fluid page-body-wrapper">
        @include('superadmin.layout.sidebar')
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="d-flex justify-content-between mb-3">
                    <h3>Tabel Mahasiswa Ketua Kelas</h3>
                    <a href="{{ route('tabel_mhs.create') }}" class="btn btn-primary">Tambah</a>
                </div>
                <div class="row justify-content-center">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <!-- Tabel Mahasiswa -->
                    <table class="table align-middle mb-0 bg-white">
                        <thead class="bg-light">
                            <tr>
                                <th>Name</th>
                                <th>NIM</th>
                                <th>Program Studi</th>
                                <th>Angkatan</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($mahasiswa as $user)
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset('storage/' . $user->fotoprofile) }}" alt="" style="width: 45px; height: 45px" class="rounded-circle" />
                                        <div class="ms-3">
                                            <p class="fw-bold mb-1">{{ $user->name }}</p>
                                            <p class="text-muted mb-0">{{ $user->email }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <p class="fw-normal mb-1">{{ $user->nim }}</p>
                                </td>
                                <td>
                                    <p class="fw-normal mb-1">{{ $user->program_studi }}</p>
                                </td>
                                <td>
                                    <p class="fw-normal mb-1">{{ $user->kelas }}</p>
                                    <p class="text-muted mb-0">Angkatan {{ $user->angkatan }}</p>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-primary">Detail</button>
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
@include('admin.layout.footer')
