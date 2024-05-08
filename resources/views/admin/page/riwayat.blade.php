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
                          <h4>Perhari</h4>
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
                                <tr>
                                    <td>1</td>
                                    <td>M.Hazron Redian</td>
                                    <td>F1E112162</td>
                                    <td>Komputasi Sains</td>
                                    <td>PPSI</td>
                                    <td>08.30</td>
                                    <td>11.00</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>M.Hazron Redian</td>
                                    <td>F1E112162</td>
                                    <td>Komputasi Sains</td>
                                    <td>PPSI</td>
                                    <td>08.30</td>
                                    <td>11.00</td>
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
