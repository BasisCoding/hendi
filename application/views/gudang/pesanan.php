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

      <div class="modal fade show" id="modal-PesananSiap" tabindex="-1" role="dialog" aria-labelledby="modal-PesananSiap" aria-modal="true">
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
                <h4 class="heading mt-4">Apakah pesanan dengan kode <span id="pesanan-siap"></span> sudah anda siapkan ?</h4>
                <form class="form" id="form-PesananSiap" method="POST">
                  <input type="hidden" name="id_pesanan_siap">
                </form>
              </div>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-white" id="btn-siap-pesanan" form="form-PesananSiap">Ok, Siap Dikirim</button>
              <button type="button" class="btn btn-link text-white ml-auto" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
