      <!-- Page content -->
  <div class="container-fluid mt--6">
      <!-- Table -->
      <div class="row">
        <div class="col">

          <div class="card">
            
            <div class="py-4">
              <table class="table table-flush" id="table-pesanan">
                <thead class="thead-light">
                  <tr>
                    <th>No</th>
                    <th>KODE PESANAN</th>
                    <th>NAMA PELANGGAN</th>
                    <th>NAMA SALESMAN</th>
                    <th>KODE BARANG</th>
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

      <div class="modal fade" id="modal-detailPesanan" tabindex="-1" role="dialog" aria-labelledby="modal-detailPesanan" aria-hidden="true">
        <div class="modal-dialog modal- modal-dialog-top modal-sm" role="document">
            <div class="modal-content">
                
                <div class="modal-header">
                    <h6 class="modal-title" id="modal-title-default">Detail Pesanan</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>

                <div class="modal-body">
                  <table>
                    <tr>
                      <td>Kode Pesanan</td>
                      <td>:</td>
                      <td class="kode_pesanan"></td>
                    </tr>
                    <tr>
                      <td>Nama Salesman</td>
                      <td>:</td>
                      <td class="nama_salesman"></td>
                    </tr>
                    <tr>
                      <td>Nama Pelanggan</td>
                      <td>:</td>
                      <td class="nama_pelanggan"></td>
                    </tr>
                    <tr>
                      <td>Kode Barang</td>
                      <td>:</td>
                      <td class="kode_barang"></td>
                    </tr>
                    <tr>
                      <td>Nama Barang</td>
                      <td>:</td>
                      <td class="nama_barang"></td>
                    </tr>
                    <tr>
                      <td>Jumlah Barang</td>
                      <td>:</td>
                      <td class="jumlah_barang"></td>
                    </tr>
                    <tr>
                      <td>Alamat</td>
                      <td>:</td>
                      <td class="alamat"></td>
                    </tr>
                    <tr>
                      <td>HP</td>
                      <td>:</td>
                      <td class="hp"></td>
                    </tr>
                  </table>

                </div>

                <div class="modal-footer mt-0">
                  <button type="submit" form="form-detailPesanan" class="btn btn-primary align-right">Save</button>
                </div>
                
            </div>
        </div>
      </div>

      <div class="modal fade show" id="modal-KirimPesanan" tabindex="-1" role="dialog" aria-labelledby="modal-KirimPesanan" aria-modal="true">
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
                <h4 class="heading mt-4">Apakah pesanan dengan kode <span id="pesanan-kirim"></span> ingin dikirim ?</h4>
                <form class="form" id="form-KirimPesanan" method="POST">
                  <input type="hidden" name="id_pesanan_kirim">
                </form>
              </div>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-white" id="btn-kirim-pesanan" form="form-KirimPesanan">Ok, Kirim</button>
              <button type="button" class="btn btn-link text-white ml-auto" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
