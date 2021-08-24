      <!-- Page content -->
  <div class="container-fluid mt--6">
      <!-- Table -->
      <div class="row">
        <div class="col">

          <div class="card">
            <!-- Card header -->
            <div class="card-header">
                <div class="col text-right">
                    <button class="btn btn-sm btn-neutral btn-round btn-icon" data-toggle="modal" id="btn-addBarang" data-target="#modal-addBarang">
                      <span class="btn-inner--icon"><i class="ni ni-fat-add"></i></span>
                      <span class="btn-inner--text">Tambah</span>
                    </button>
                </div>
            </div>
            <div class="py-4">
              <table class="table table-flush" id="table-barang">
                <thead class="thead-light">
                  <tr>
                    <th>No</th>
                    <th>KODE Barang</th>
                    <th>NAMA BARANG</th>
                    <th>HARGA BARANG</th>
                    <th>STOK BARANG</th>
                    <th>AKSI</th>
                  </tr>
                </thead>
                <tbody id="table-data-barang">
                </tbody>
              </table>
            </div>
          </div>

        </div>
      </div>

      <div class="modal fade" id="modal-addBarang" tabindex="-1" role="dialog" aria-labelledby="modal-addBarang" aria-hidden="true">
        <div class="modal-dialog modal- modal-dialog-top modal-sm" role="document">
            <div class="modal-content">
                
                <div class="modal-header">
                    <h6 class="modal-title" id="modal-title-default">Tambah Barang</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>

                <div class="modal-body">
                  <form class="form" id="form-addBarang" method="POST" enctype="multipart/form-data">

                      <div class="form-group">
                        <label class="h5">Kode Barang</label>
                        <input type="text" name="kode_barang" class="form-control">
                      </div>

                      <div class="form-group">
                        <label class="h5">Nama Barang</label>
                        <input type="text" name="nama_barang" class="form-control">
                      </div>

                      <div class="row">
                        <div class="col-md-7">
                          <div class="form-group">
                            <label class="h5">Harga Barang</label>
                            <input type="text" name="harga_barang" class="form-control">
                          </div>
                        </div>

                        <div class="col-md">
                          <div class="form-group">
                            <label class="h5">Stok Barang</label>
                            <input type="number" name="stok_barang" class="form-control">
                          </div>
                        </div>
                      </div>
                    
                  </form> 
                </div>

                <div class="modal-footer mt-0">
                  <button type="submit" form="form-addBarang" class="btn btn-primary align-right">Save</button>
                </div>
                
            </div>
        </div>
      </div>

      <div class="modal fade" id="modal-updateBarang" tabindex="-1" role="dialog" aria-labelledby="modal-updateBarang" aria-hidden="true">
        <div class="modal-dialog modal- modal-dialog-top modal-md" role="document">
            <div class="modal-content">
                
                <div class="modal-header">
                    <h6 class="modal-title" id="modal-title-default">Update Barang</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>

                <div class="modal-body">
                  <form class="form" id="form-updateBarang" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id_update">
                    
                    <div class="form-group">
                      <label class="h5">Kode Barang</label>
                      <input type="text" name="kode_barang_update" class="form-control">
                    </div>

                    <div class="form-group">
                      <label class="h5">Nama Barang</label>
                      <input type="text" name="nama_barang_update" class="form-control">
                    </div>

                    <div class="row">
                      <div class="col-md-7">
                        <div class="form-group">
                          <label class="h5">Harga Barang</label>
                          <input type="text" name="harga_barang_update" class="form-control">
                        </div>
                      </div>

                      <div class="col-md">
                        <div class="form-group">
                          <label class="h5">Stok Barang</label>
                          <input type="number" name="stok_barang_update" class="form-control">
                        </div>
                      </div>
                    </div>
                    
                  </form> 
                </div>

                <div class="modal-footer mt-0">
                  <button type="submit" form="form-updateBarang" class="btn btn-primary align-right">Save</button>
                </div>
                
            </div>
        </div>
      </div>

      <div class="modal fade show" id="modal-deleteBarang" tabindex="-1" role="dialog" aria-labelledby="modal-deleteBarang" aria-modal="true">
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
                <h4 class="heading mt-4">Apakah anda yakin ingin menghapus barang <span id="barang-delete"></span></h4>
                <form class="form" id="form-deleteBarang" method="POST">
                  <input type="hidden" name="id_barang_delete">
                </form>
              </div>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-white" id="btn-delete-pesanan" form="form-deleteBarang">Ok, Hapus</button>
              <button type="button" class="btn btn-link text-white ml-auto" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
