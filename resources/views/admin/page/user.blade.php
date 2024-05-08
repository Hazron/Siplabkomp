@include('admin.layout.head')
  <div class="container-scroller">
    @include('admin.layout.navbar')
    <div class="container-fluid page-body-wrapper">
      @include('admin.layout.sidebar')
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row justify-content-center">
            <table class="table align-middle mb-0 bg-white">
              <thead class="bg-light">
                <tr>
                  <th>Name</th>
                  <th>NIM</th>
                  <th>Program Studi</th>
                  <th>Kelas</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>
                    <div class="d-flex align-items-center">
                      <img
                          src="https://mdbootstrap.com/img/new/avatars/8.jpg"
                          alt=""
                          style="width: 45px; height: 45px"
                          class="rounded-circle"
                          />
                      <div class="ms-3">
                        <p class="fw-bold mb-1">M.Hazron Redian</p>
                        <p class="text-muted mb-0">Hazron@gmail.com</p>
                      </div>
                    </div>
                  </td>
                  <td>
                    <p class="fw-normal mb-1">F1E121162</p>
                  </td>
                  <td>
                    <p class="fw-normal mb-1">Sistem Informasi</p>
                  </td>
                  <td>
                    <p class="fw-normal mb-1">R-005</p>
                    <p class="text-muted mb-0">Semester 6</p>
                  </td>
                  <td>
                    <button type="button" class="btn btn-link btn-sm btn-rounded">
                      View
                    </button>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

@include('admin.layout.footer')
