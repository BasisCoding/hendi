      <!-- Page content -->
  <div class="container-fluid mt--6">
      <!-- Table -->
      <div class="row">
        <div class="col">

          <div class="card">
            <!-- Card header -->
            <div class="card-header">
                <div class="col text-right">
                    <button class="btn btn-sm btn-neutral btn-round btn-icon" data-toggle="modal" data-target="#modal-addGudang">
                      <span class="btn-inner--icon"><i class="ni ni-fat-add"></i></span>
                      <span class="btn-inner--text">Tambah</span>
                    </button>
                </div>
            </div>
            <div class="py-4">
              <table class="table table-flush" id="table-gudang">
                <thead class="thead-light">
                  <tr>
                    <th>No</th>
                    <th>Username</th>
                    <th>Nama Lengkap</th>
                    <th>Email</th>
                    <th>HP</th>
                    <th>JK</th>
                    <th>TTL</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody id="table-data-gudang">
                </tbody>
              </table>
            </div>
          </div>

        </div>
      </div>

      <div class="modal fade" id="modal-addGudang" tabindex="-1" role="dialog" aria-labelledby="modal-addGudang" aria-hidden="true">
        <div class="modal-dialog modal- modal-dialog-top modal-lg" role="document">
            <div class="modal-content">
                
                <div class="modal-header">
                    <h6 class="modal-title" id="modal-title-default">Tambah gudang</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>

                <div class="modal-body">
                  <form class="form" id="form-addGudang" method="POST" enctype="multipart/form-data">

                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="h5">Username</label>
                          <input type="text" name="username" class="form-control form-control-sm" required>
                        </div>

                        <div class="row">
                          <div class="col-6">
                            <div class="form-group">
                              <label class="h5">Password</label>
                              <input type="password" name="password" class="form-control form-control-sm">
                              <small class="notSamePassword text-danger" hidden>
                                Password Tidak Sama
                              </small>
                            </div>
                          </div>
                          <div class="col-6">
                            <div class="form-group">
                              <label class="h5">Konfirmasi Password</label>
                              <input type="password" name="konf_password" class="form-control form-control-sm">
                              <small class="notSamePassword text-danger" hidden>
                                Konfirmasi Password Tidak Sama
                              </small>
                            </div>
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="h5">Nama Lengkap</label>
                          <input type="text" name="nama_lengkap" class="form-control form-control-sm" required>
                        </div>  

                        <div class="form-group">
                          <label class="h5">Email</label>
                          <input type="email" name="email" class="form-control form-control-sm" required>
                        </div>

                      </div>

                      <div class="col-md-6">

                        <div class="form-group">

                          <label class="h5">Jenis Kelamin</label>
                          <div class="row">
                            <div class="col">
                              <div class="custom-control custom-radio">
                                <input name="jenis_kelamin" class="custom-control-input" id="laki-laki" type="radio" value="L" checked>
                                <label class="custom-control-label" for="laki-laki">Laki-Laki</label>
                              </div>
                            </div>

                            <div class="col text-left">
                              <div class="custom-control custom-radio mb-2">
                                <input name="jenis_kelamin" class="custom-control-input" id="perempuan" type="radio" value="P">
                                <label class="custom-control-label" for="perempuan">Perempuan</label>
                              </div>
                            </div>
                          </div>
                          
                        </div>

                        <div class="form-group">
                          <label class="h5">Tempat, Tanggal Lahir</label>
                          <div class="input-group input-group-merge input-group-alternative">
                            <div class="input-group-prepend">
                              <input type="text" name="tempat_lahir" placeholder="Tempat Lahir" class="form-control form-control-sm" required>
                            </div>
                            <input type="date" name="tanggal_lahir" class="form-control form-control-sm" required>
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="h5">HP</label>
                          <input type="number" name="hp" class="form-control form-control-sm" required>
                        </div>

                        <div class="form-group">
                          <label class="h5">Alamat</label>
                          <textarea class="form-control form-control-sm" name="alamat"></textarea required>
                        </div>

                      </div>

                    </div>
                    
                  </form> 
                </div>

                <div class="modal-footer mt-0">
                  <button type="submit" form="form-addGudang" class="btn btn-primary align-right">Save</button>
                </div>
                
            </div>
        </div>
      </div>

      <div class="modal fade" id="modal-updateGudang" tabindex="-1" role="dialog" aria-labelledby="modal-updateGudang" aria-hidden="true">
        <div class="modal-dialog modal- modal-dialog-top modal-lg" role="document">
            <div class="modal-content">
                
                <div class="modal-header">
                    <h6 class="modal-title" id="modal-title-default">Update gudang</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>

                <div class="modal-body">
                  <form class="form" id="form-updateGudang" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id_update">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="h5">Username</label>
                          <input type="text" name="username_update" class="form-control form-control-sm" readonly>
                        </div>

                        <div class="form-group">
                          <label class="h5">Nama Lengkap</label>
                          <input type="text" name="nama_lengkap_update" class="form-control form-control-sm" required>
                        </div>  

                        <div class="form-group">
                          <label class="h5">Email</label>
                          <input type="email" name="email_update" class="form-control form-control-sm" required>
                        </div>

                      </div>

                      <div class="col-md-6">

                        <div class="form-group">

                          <label class="h5">Jenis Kelamin</label>
                          <div class="row">
                            <div class="col">
                              <div class="custom-control custom-radio">
                                <input name="jenis_kelamin_update" class="custom-control-input" id="laki-laki_update" type="radio" value="L">
                                <label class="custom-control-label" for="laki-laki_update">Laki-Laki</label>
                              </div>
                            </div>

                            <div class="col text-left">
                              <div class="custom-control custom-radio mb-2">
                                <input name="jenis_kelamin_update" class="custom-control-input" id="perempuan_update" type="radio" value="P">
                                <label class="custom-control-label" for="perempuan_update">Perempuan</label>
                              </div>
                            </div>
                          </div>
                          
                        </div>

                        <div class="form-group">
                          <label class="h5">Tempat, Tanggal Lahir</label>
                          <div class="input-group input-group-merge input-group-alternative">
                            <div class="input-group-prepend">
                              <input type="text" name="tempat_lahir_update" placeholder="Tempat Lahir" class="form-control form-control-sm" required>
                            </div>
                            <input type="date" name="tanggal_lahir_update" class="form-control form-control-sm" required>
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="h5">HP</label>
                          <input type="number" name="hp_update" class="form-control form-control-sm" required>
                        </div>

                        <div class="form-group">
                          <label class="h5">Alamat</label>
                          <textarea class="form-control form-control-sm" name="alamat_update"></textarea required>
                        </div>

                      </div>
                    
                    </div>
                    
                  </form> 
                </div>

                <div class="modal-footer mt-0">
                  <button type="submit" form="form-updateGudang" class="btn btn-primary align-right">Save</button>
                </div>
                
            </div>
        </div>
      </div>

      <div class="modal fade show" id="modal-deleteGudang" tabindex="-1" role="dialog" aria-labelledby="modal-deleteGudang" aria-modal="true">
        <div class="modal-dialog modal-danger modal-dialog-top modal-sm" role="document">
          <div class="modal-content bg-gradient-danger">
            <div class="modal-header">
              <h6 class="modal-title" id="modal-title-notification">Warning !</h6>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="py-3 text-center">
                <i class="ni ni-bell-55 ni-3x"></i>
                <h4 class="heading mt-4">Apakah anda yakin ingin menghapus gudang <span id="gudang-delete"></span></h4>
                <form class="form" id="form-deleteGudang" method="POST">
                  <input type="hidden" name="id_gudang_delete">
                </form>
              </div>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-white" id="btn-delete-gudang" form="form-deleteGudang">Ok, Hapus</button>
              <button type="button" class="btn btn-link text-white ml-auto" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
