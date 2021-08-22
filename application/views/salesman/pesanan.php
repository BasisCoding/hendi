      <!-- Page content -->
  <div class="container-fluid mt--6">
      <!-- Table -->
      <div class="row">
        <div class="col">

          <div class="card">
            <!-- Card header -->
            <div class="card-header">
                <div class="col text-right">
                    <button class="btn btn-sm btn-neutral btn-round btn-icon" data-toggle="modal" data-target="#modal-addPesanan">
                      <span class="btn-inner--icon"><i class="ni ni-fat-add"></i></span>
                      <span class="btn-inner--text">Tambah</span>
                    </button>
                </div>
            </div>
            <div class="py-4">
              <table class="table table-flush" id="table-pesanan">
                <thead class="thead-light">
                  <tr>
                    <th>No</th>
                    <th>KODE PESANAN</th>
                    <th>NAMA PELANGGAN</th>
                    <th>KODE BARANG</th>
                    <th>NAMA BARANG</th>
                    <th>HARGA BARANG</th>
                    <th>JUMLAH BARANG</th>
                    <th>STATUS</th>
                    <th>AKSI</th>
                  </tr>
                </thead>
                <tbody id="table-data-pesanan">
                </tbody>
              </table>
            </div>
          </div>

        </div>
      </div>

      <div class="modal fade" id="modal-addPesanan" tabindex="-1" role="dialog" aria-labelledby="modal-addPesanan" aria-hidden="true">
        <div class="modal-dialog modal- modal-dialog-top modal-sm" role="document">
            <div class="modal-content">
                
                <div class="modal-header">
                    <h6 class="modal-title" id="modal-title-default">Tambah Pesanan</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>

                <div class="modal-body">
                  <form class="form" id="form-addPesanan" method="POST" enctype="multipart/form-data">

                      <div class="form-group">
                        <label class="h5">Kode Pesanan</label>
                        <input type="text" name="kode_pesanan" class="form-control" readonly="">
                      </div>

                      <div class="form-group">
                        <label class="h5">Pilih Pelanggan</label>
                        <select name="id_pelanggan" class="id_pelanggan">
                          <option></option>
                        </select>
                      </div>
                      
                      <div class="form-group">
                        <label class="h5">Pilih Barang</label>
                        <select name="id_barang" class="id_barang">
                          <option></option>
                        </select>
                      </div>

                      <div class="row">
                        <div class="col-md-7">
                          <div class="form-group">
                            <label class="h5">Harga Barang</label>
                            <input type="text" name="harga_barang" class="form-control" readonly="">
                          </div>
                        </div>

                        <div class="col-md">
                          <div class="form-group">
                            <label class="h5">Jumlah Barang</label>
                            <input type="number" name="jumlah_barang" class="form-control">
                          </div>
                        </div>
                      </div>

                    
                  </form> 
                </div>

                <div class="modal-footer mt-0">
                  <button type="submit" form="form-addPesanan" class="btn btn-primary align-right">Save</button>
                </div>
                
            </div>
        </div>
      </div>

      <div class="modal fade" id="modal-updatePesanan" tabindex="-1" role="dialog" aria-labelledby="modal-updatePesanan" aria-hidden="true">
        <div class="modal-dialog modal- modal-dialog-top modal-lg" role="document">
            <div class="modal-content">
                
                <div class="modal-header">
                    <h6 class="modal-title" id="modal-title-default">Update Pesanan</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>

                <div class="modal-body">
                  <form class="form" id="form-updatePesanan" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id_update">
                    
                    <div class="form-group">
                      <label class="h5">Kode Pesanan</label>
                      <input type="text" name="kode_pesanan_update" class="form-control" readonly="">
                    </div>

                    <div class="form-group">
                      <label class="h5">Pilih Pelanggan</label>
                      <select name="id_pelanggan_update" class="id_pelanggan">
                        <option></option>
                      </select>
                    </div>
                    
                    <div class="form-group">
                      <label class="h5">Pilih Barang</label>
                      <select name="id_barang_update" class="id_barang">
                        <option></option>
                      </select>
                    </div>

                    <div class="row">
                      <div class="col-md-7">
                        <div class="form-group">
                          <label class="h5">Harga Barang</label>
                          <input type="text" name="harga_barang_update" class="form-control" readonly="">
                        </div>
                      </div>

                      <div class="col-md">
                        <div class="form-group">
                          <label class="h5">Jumlah Barang</label>
                          <input type="number" name="jumlah_barang_update" class="form-control">
                        </div>
                      </div>
                    </div>
                    
                  </form> 
                </div>

                <div class="modal-footer mt-0">
                  <button type="submit" form="form-updatePesanan" class="btn btn-primary align-right">Save</button>
                </div>
                
            </div>
        </div>
      </div>

      <div class="modal fade show" id="modal-deletePesanan" tabindex="-1" role="dialog" aria-labelledby="modal-deletePesanan" aria-modal="true">
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
                <h4 class="heading mt-4">Apakah anda yakin ingin menghapus pesanan <span id="pesanan-delete"></span></h4>
                <form class="form" id="form-deletePesanan" method="POST">
                  <input type="hidden" name="id_pesanan_delete">
                </form>
              </div>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-white" id="btn-delete-pesanan" form="form-deletePesanan">Ok, Hapus</button>
              <button type="button" class="btn btn-link text-white ml-auto" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
