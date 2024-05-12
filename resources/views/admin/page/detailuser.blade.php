@include('admin.layout.head')
  <div class="container-scroller">
    @include('admin.layout.navbar')
    <div class="container-fluid page-body-wrapper">
      @include('admin.layout.sidebar')
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
          <!-- MAIN -->
          <div class="d-flex align-items-center">
            <img src="https://mdbootstrap.com/img/new/avatars/8.jpg" alt="" style="width: 200px; height: 200px" class="rounded-circle" />
            <div class="ms-3">
                <ul class="list-unstyled">
                    <li class="h2">M.Hazron Redian</li>
                    <ul>
                        <li>Semester: 6</li>
                        <li>Ruang: R005</li>
                        <li>Program Studi: Sistem Informasi</li>
                    </ul>
                </ul>
            </div>
        </div>        
            <div class="table-responsive mt-3">
              <div class="btn-group">
                <button type="button" class="btn btn-light bg-white dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                  Pilih Tabel
                </button>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="#" onclick="showTable('jadwal')">Jadwal Perkuliahan</a></li>
                  <li><a class="dropdown-item" href="#" onclick="showTable('riwayat')">Riwayat Peminjaman</a></li>
                </ul>
              </div>
              <table class="table table-fixed" id="jadwal" style="display:none">
                <h4>Jadwal Name</h4>
                  <thead>
                      <tr>
                          <th>#</th>
                          <th>Hari</th>
                          <th>Ruang</th>
                          <th>Mata Kuliah</th>
                          <th>Jam Perkuliahan</th>
                      </tr>
                  </thead>
                  <tbody>
                      <tr>
                          <td>1</td>
                          <td>Senin</td>
                          <td>F1E112162</td>
                          <td>Komputasi Sains</td>
                          <td>PPSI</td>
                      </tr>
                      <tr>
                          <td>2</td>
                          <td>Senin</td>
                          <td>F1E112162</td>
                          <td>Komputasi Sains</td>
                          <td>PPSI</td>
                      </tr>
                  </tbody>
              </table>

              <table class="table table-fixed " id="riwayat" style="display:none;">
                <h4>Riwayat Perkuliahan</h4>
                  <thead>
                      <tr>
                          <th>#</th>
                          <th>Hari</th>
                          <th>Ruang</th>
                          <th>Mata Kuliah</th>
                          <th>Jam Perkuliahan</th>
                      </tr>
                  </thead>
                  <tbody>
                      <tr>
                          <td>1</td>
                          <td>Senin</td>
                          <td>F1E112162</td>
                          <td>Komputasi Sains</td>
                          <td>PPSI</td>
                      </tr>
                      <tr>
                          <td>2</td>
                          <td>Senin</td>
                          <td>F1E112162</td>
                          <td>Komputasi Sains</td>
                          <td>PPSI</td>
                      </tr>
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
