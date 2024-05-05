@include('admin.layout.head')
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_navbar.html -->
      @include('admin.layout.navbar')
      <!-- partial -->

      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_settings-panel.html -->
        <!-- partial -->
        <!-- partial:partials/_sidebar.html -->

        <!-- SIDEBAR -->
        @include('admin.layout.sidebar')

        <!-- MAIN PART -->
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="row">
              <div class="col-md-12 grid-margin">
                <div class="row">
                  <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                    <h3 class="font-weight-bold">Welcome {{ Auth::user()->name }} (Admin)</h3>
                    <h6 class="font-weight-normal mb-0" id="tanggal"></h6>
                    <span id="hari"></span>
                    <span id="jam"></span>
                  </div>
                  <div class="col-12 col-xl-4">
                    <div class="justify-content-end d-flex">
                      <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
                        <button
                          class="btn btn-sm btn-light bg-white dropdown-toggle"
                          type="button"
                          id="dropdownMenuDate2"
                          data-toggle="dropdown"
                          aria-haspopup="true"
                          aria-expanded="true">
                          <i class="mdi mdi-calendar"
                            >Pilih Ruang (Seluruh ruang)</i
                          >
                        </button>
                        <div
                          class="dropdown-menu dropdown-menu-right"
                          aria-labelledby="dropdownMenuDate2">
                          <a class="dropdown-item" href="#" id="ict1">ICT 1</a>
                          <a class="dropdown-item" href="#" id="ict2">ICT 2</a>
                          <a class="dropdown-item" href="#" id="komputasi-sains"
                            >KOMPUTASI SAINS</a
                          >
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6 grid-margin stretch-card">
                <div class="card tale-bg">
                  <div class="card-people mt-auto">
                    <img src="asset_admin/images/dashboard/people.svg" alt="people" />
                    <div class="weather-info">
                      <div class="d-flex">
                        <div>
                          <h2 class="mb-0 font-weight-normal">
                            <i class="icon-sun mr-2"></i>31<sup>C</sup>
                          </h2>
                        </div>
                        <div class="ml-2">
                          <h4 class="location font-weight-normal">Jambi</h4>
                          <h6 class="font-weight-normal">Indonesia</h6>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-md-6 grid-margin transparent">
                <div class="row">
                  <div class="col-md-6 mb-4 stretch-card transparent">
                    <div class="card card-tale">
                      <div class="card-body">
                        <p class="mb-4">Sedang Digunakan</p>
                        <p class="fs-30 mb-2">1</p>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6 mb-4 stretch-card transparent">
                    <div class="card card-dark-blue">
                      <div class="card-body">
                        <p class="mb-4">Akan Digunakan</p>
                        <p class="fs-30 mb-2">0</p>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6 stretch-card transparent">
                    <div class="card card-light-danger">
                      <div class="card-body">
                        <p class="mb-4">Menunggu Konfirmasi</p>
                        <p class="fs-30 mb-2">4</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          @include('admin.layout.footer')