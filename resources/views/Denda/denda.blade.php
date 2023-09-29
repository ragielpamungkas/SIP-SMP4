@include('template.header')
@include('template.sidemenu')
<!-- header -->
    <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Pages</a></li>
                <li class="breadcrumb-item text-sm text-white active" aria-current="page">Data Denda</li>
            </ol>
            <h6 class="font-weight-bolder text-white mb-0">Data Denda</h6>
    </nav>
<!-- content Tambah Data Denda -->
    <div class="container-fluid py-4">
        <div class="row mt-4">
            <div class="col-lg-6 mb-lg-0 mb-4">
                <div class="card ">
                    <div class="card-header pb-0 p-3">
                        <div class="d-flex justify-content-between">
                            <h6 class="mb-2">Tambah Data Denda</h6>
                        </div>
                        <hr class="my-4">
                    </div>
        <div class="card-body">
            <div class="row">
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Harga Denda</label>
                        <input class="form-control" type="text" value="" onfocus="focused(this)" onfocusout="defocused(this)">
                    </div>
                    <button type="button" class="btn bg-gradient-info">Tambah Harga Denda</button>
                </div>
                </div>
            </div>
    </div>
    <div class="col-lg-6">
        <div class="card">
        <div class="card-header pb-0">
                  <h6>Show</h6>
            <span style="float: right">
              <div class="input-group">
              <input type="text" class="form-control" placeholder="Search...">
              <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
              </span>
          </div>
          </div>
            <div class="card-body px-0 pt-0 pb-2">
                <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0">
                        <thead>
                        <tr>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Harga Denda</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Status</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Tanggal Tetap</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                        <td>
                            <div class="d-flex px-2 py-1">
                            <div>
                                <img src="../assets/img/team-2.jpg" class="avatar avatar-sm me-3" alt="user1">
                            </div>
                            <div class="d-flex flex-column justify-content-center">
                                <h6 class="mb-0 text-sm">John Michael</h6>
                                <p class="text-xs text-secondary mb-0">john@creative-tim.com</p>
                            </div>
                            </div>
                        </td>
                        <td>
                            <p class="text-xs font-weight-bold mb-0">Manager</p>
                            <p class="text-xs text-secondary mb-0">Organization</p>
                        </td>
                        <td class="align-middle">
                            <a href="javascript:;" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                            Edit
                            </a>
                        </td>
                        </tr>
                    </tbody>
                </table>
                </div>
                </div>
                </div>
                </div>
            </div>
        </div>
    </div>
@include('template.footer')