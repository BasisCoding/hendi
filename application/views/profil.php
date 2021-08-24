      <!-- Page content -->
  <div class="container-fluid mt--6">
      <!-- Table -->
      <div class="row">
        <div class="col">

          <div class="card">
            <div class="card-body">
              <form id="form-updateProfil" method="POST" enctype="multipart/form-data">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="h5">Username</label class="h5">
                      <input type="text" name="username" class="form-control">
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="h5">Password</label class="h5">
                      <input type="text" name="password" class="form-control">
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label class="h5">Nama Lengkap</label class="h5">
                      <input type="text" name="nama_lengkap" class="form-control">
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="form-group">
                      <label class="h5">Email</label class="h5">
                      <input type="email" name="email" class="form-control">
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="form-group">
                      <label class="h5">HP</label class="h5">
                      <input type="number" name="hp" class="form-control">
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="h5">Jenis Kelamin</label class="h5">
                      <select class="form-control" name="jenis_kelamin">
                        <option value="L">Laki-Laki</option>
                        <option value="P">Perempuan</option>
                      </select>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="h5">Tempat, Tanggal Lahir</label class="h5">
                      <div class="input-group input-group-merge input-group-alternative">
                        <div class="input-group-prepend">
                          <input type="text" name="tempat_lahir" placeholder="Tempat Lahir" class="form-control" required>
                        </div>
                        <input type="date" name="tanggal_lahir" class="form-control" required>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md">
                      <div class="form-group">
                        <label class="h5">Alamat</label class="h5">
                        <textarea name="alamat" class="form-control"></textarea>
                      </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md text-right">
                    <button type="submit" class="btn btn-outline-success">Save</button>
                  </div>
                </div>
              </form>
            </div>
          </div>

        </div>
      </div>
