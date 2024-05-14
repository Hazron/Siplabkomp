<footer class="footer">
  <div class="d-sm-flex justify-content-center justify-content-sm-between">
    <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">
      Copyright © 2024. SIPLABKOMP FST Universitas Jambi
    </span>
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
<script src="{{ asset('asset_admin/vendors/js/vendor.bundle.base.js') }}"></script>
<!-- endinject -->
<!-- Plugin js for this page -->
<script src="{{ asset('asset_admin/vendors/chart.js/Chart.min.js') }}"></script>
<script src="{{ asset('asset_admin/vendors/datatables.net/jquery.dataTables.js') }}"></script>
<script src="{{ asset('asset_admin/vendors/datatables.net-bs4/dataTables.bootstrap4.js') }}"></script>
<script src="{{ asset('asset_admin/js/dataTables.select.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

<!-- End plugin js for this page -->
<!-- inject:js -->
<script src="{{ asset('asset_admin/js/off-canvas.js') }}"></script>
<script src="{{ asset('asset_admin/js/hoverable-collapse.js') }}"></script>
<script src="{{ asset('asset_admin/js/template.js') }}"></script>
<!-- endinject -->
<!-- Custom js for this page-->
<script src="{{ asset('asset_admin/js/dashboard.js') }}"></script>
<script src="{{ asset('asset_admin/js/Chart.roundedBarCharts.js') }}"></script>
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

<script>
  const showTable = tableId => {
      document.querySelectorAll('.table').forEach(table => {
          table.style.display = 'none';
      });

      document.getElementById(tableId).style.display = 'table';
  };
</script>
</body>
</html>
