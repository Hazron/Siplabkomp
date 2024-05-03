<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Admin - Siplabkomp</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="asset_admin/vendors/feather/feather.css" />
    <link rel="stylesheet" href="asset_admin/vendors/ti-icons/css/themify-icons.css" />
    <link rel="stylesheet" href="asset_admin/vendors/css/vendor.bundle.base.css" />
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link
      rel="stylesheet"
      href="asset_admin/vendors/datatables.net-bs4/dataTables.bootstrap4.css" />
    <link rel="stylesheet" href="asset_admin/vendors/ti-icons/css/themify-icons.css" />
    <link
      rel="stylesheet"
      type="text/css"
      href="asset_admin/js/select.dataTables.min.css" />
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="asset_admin/css/vertical-layout-light/style.css" />
    <!-- endinject -->
    <link rel="shortcut icon" href="asset_admin/images/favicon.png" />
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_navbar.html -->
      <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div
          class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
          <a class="navbar-brand brand-logo mr-5" href="index.html"
            ><img src="asset_admin/images/logo.svg" class="mr-2" alt="logo"
          /></a>
          <a class="navbar-brand brand-logo-mini" href="index.html"
            ><img src="asset_admin/images/logo-mini.svg" alt="logo"
          /></a>
        </div>
        <div
          class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
          <button
            class="navbar-toggler navbar-toggler align-self-center"
            type="button"
            data-toggle="minimize">
            <span class="icon-menu"></span>
          </button>

          <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item nav-profile dropdown">
              <a
                class="nav-link dropdown-toggle"
                href="#"
                data-toggle="dropdown"
                id="profileDropdown">
                <img src="asset_admin/images/faces/face28.jpg" alt="profile" />
              </a>
              <div
                class="dropdown-menu dropdown-menu-right navbar-dropdown"
                aria-labelledby="profileDropdown">
                <a class="dropdown-item">
                  <i class="ti-settings text-primary"></i>
                  Profile
                </a>
                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                  <i class="ti-power-off text-primary"></i>
                  Logout
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
                </form>
              </div>
            </li>
          </ul>
          <button
            class="navbar-toggler navbar-toggler-right d-lg-none align-self-center"
            type="button"
            data-toggle="offcanvas">
            <span class="icon-menu"></span>
          </button>
        </div>
      </nav>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_settings-panel.html -->
        <!-- partial -->
        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <li class="nav-item">
              <a class="nav-link" href="index.html">
                <i class="icon-grid menu-icon"></i>
                <span class="menu-title">Dashboard</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <i class="icon-grid menu-icon"></i>
                <span class="menu-title">Pengambilan Kunci</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <i class="icon-grid menu-icon"></i>
                <span class="menu-title">Tabel Jadwal</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <i class="icon-grid menu-icon"></i>
                <span class="menu-title">Tabel User</span>
              </a>
            </li>
          </ul>
        </nav>
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
          <footer class="footer">
            <div
              class="d-sm-flex justify-content-center justify-content-sm-between">
              <span
                class="text-muted text-center text-sm-left d-block d-sm-inline-block"
                >Copyright © 2021. Premium
                <a href="https://www.bootstrapdash.com/" target="_blank"
                  >Bootstrap admin template</a
                >
                from BootstrapDash. All rights reserved.</span
              >
              <span
                class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"
                >Hand-crafted & made with
                <i class="ti-heart text-danger ml-1"></i
              ></span>
            </div>
            <div
              class="d-sm-flex justify-content-center justify-content-sm-between">
              <span
                class="text-muted text-center text-sm-left d-block d-sm-inline-block"
                >Distributed by
                <a href="https://www.themewagon.com/" target="_blank"
                  >Themewagon</a
                ></span
              >
            </div>
          </footer>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->

    <!-- plugins:js -->
    <script src="asset_admin/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="asset_admin/vendors/chart.js/Chart.min.js"></script>
    <script src="asset_admin/vendors/datatables.net/jquery.dataTables.js"></script>
    <script src="asset_admin/vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
    <script src="asset_admin/js/dataTables.select.min.js"></script>

    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="asset_admin/js/off-canvas.js"></script>
    <script src="asset_admin/js/hoverable-collapse.js"></script>
    <script src="asset_admin/js/template.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="asset_admin/js/dashboard.js"></script>
    <script src="asset_admin/js/Chart.roundedBarCharts.js"></script>
    <!-- End custom js for this page-->
    <script>
      const tanggalElement = document.getElementById("tanggal");
      const hariElement = document.getElementById("hari");
      const jamElement = document.getElementById("jam");

      function getFormattedDate() {
        const date = new Date();
        const options = { year: "numeric", month: "long", day: "numeric" };
        const formattedDate = date.toLocaleDateString("id-ID", options);
        return formattedDate;
      }

      function getFormattedDay() {
        const days = [
          "Minggu",
          "Senin",
          "Selasa",
          "Rabu",
          "Kamis",
          "Jumat",
          "Sabtu",
        ];
        const date = new Date();
        const dayIndex = date.getDay();
        return days[dayIndex];
      }

      function updateClock() {
        const date = new Date();
        const options = {
          hour: "numeric",
          minute: "numeric",
          second: "numeric",
          hour12: false,
        };
        const formattedTime = date.toLocaleTimeString("en-US", options);
        jamElement.innerText = formattedTime;
      }

      tanggalElement.innerText = getFormattedDate();
      hariElement.innerText = getFormattedDay();
      updateClock();
      setInterval(updateClock, 1000);
    </script>
  </body>
</html>
