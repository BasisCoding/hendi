
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title><?= SHORT_SITE_URL.' | '.$page_title ?></title>
  <!-- Favicon -->
  <link rel="icon" href="<?= site_url('assets/assets/img/brand/favicon.png') ?>" type="image/png">
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <!-- Icons -->
  <link rel="stylesheet" href="<?= site_url('assets/assets/vendor/nucleo/css/nucleo.css') ?>" type="text/css">
  <link rel="stylesheet" href="<?= site_url('assets/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css') ?>" type="text/css">
  <link rel="stylesheet" href="<?= site_url('assets/assets/vendor/animate.css/animate.min.css') ?>">

  <!-- Argon CSS -->
  <link rel="stylesheet" href="<?= site_url('assets/assets/css/argon.css?v=1.1.0') ?>" type="text/css">
</head>

<body class="bg-default">

  <!-- Main content -->
  <div class="main-content">

    <!-- Page content -->
    <div class="container py-5 pb-5">
      <div class="row justify-content-center">
        <div class="col-xl-4 order-xl-2">
          <div class="card card-profile">
            <img src="<?= base_url('assets/assets/img/theme/img-1-1000x600.jpg') ?>" alt="Image placeholder" class="card-img-top">
            <div class="row justify-content-center">
              <div class="col-lg-3 order-lg-2">
                <div class="card-profile-image">
                  <a href="#">
                    <img id="foto-card" width="130" height="130" src="<?= base_url('assets/assets/img/theme/team-4.jpg') ?>" class="rounded-circle">
                  </a>
                </div>
              </div>
            </div>
            
            <div class="card-body pt-5">
              <div class="row">
                <div class="col">
                  <div class="card-profile-stats d-flex justify-content-center">
                    <div>
                      <span class="heading" id="jumlah-tagihan">22</span>
                      <span class="description">Jumlah Tagihan Yang Sudah Dibayar</span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="text-center">
                <h5 class="h3">
                  <span id="nama-card"></span><span class="font-weight-light">, <span id="umur-card"></span></span>
                </h5>
                <div class="h5 font-weight-300">
                  <i class="ni location_pin mr-2"></i><span id="tempat-tanggal-lahir-card"></span>
                </div>
                <div class="h5 mt-4">
                  <i class="ni business_briefcase-24 mr-2"></i><span id="kategori-card"></span>
                </div>
                <div>
                  <i class="ni education_hat mr-2"></i>University of Computer Science
                </div>
              </div>
            </div>
          </div>
          <!-- Progress track -->
          <div class="card">
            <!-- Card header -->
            <div class="card-header">
              <!-- Title -->
              <h5 class="h3 mb-0">Progress track</h5>
            </div>
            <!-- Card body -->
            <div class="card-body">
              <!-- List group -->
              <ul class="list-group list-group-flush list my--3">
                <li class="list-group-item px-0">
                  <div class="row align-items-center">
                    <div class="col-auto">
                      <!-- Avatar -->
                      <a href="#" class="avatar rounded-circle">
                        <img alt="Image placeholder" src="<?= base_url('assets/assets/img/theme/bootstrap.jpg') ?>">
                      </a>
                    </div>
                    <div class="col">
                      <h5>Argon Design System</h5>
                      <div class="progress progress-xs mb-0">
                        <div class="progress-bar bg-orange" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;"></div>
                      </div>
                    </div>
                  </div>
                </li>
                <li class="list-group-item px-0">
                  <div class="row align-items-center">
                    <div class="col-auto">
                      <!-- Avatar -->
                      <a href="#" class="avatar rounded-circle">
                        <img alt="Image placeholder" src="<?= base_url('assets/assets/img/theme/angular.jpg') ?>">
                      </a>
                    </div>
                    <div class="col">
                      <h5>Angular Now UI Kit PRO</h5>
                      <div class="progress progress-xs mb-0">
                        <div class="progress-bar bg-green" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
                      </div>
                    </div>
                  </div>
                </li>
                <li class="list-group-item px-0">
                  <div class="row align-items-center">
                    <div class="col-auto">
                      <!-- Avatar -->
                      <a href="#" class="avatar rounded-circle">
                        <img alt="Image placeholder" src="<?= base_url('assets/assets/img/theme/sketch.jpg') ?>">
                      </a>
                    </div>
                    <div class="col">
                      <h5>Black Dashboard</h5>
                      <div class="progress progress-xs mb-0">
                        <div class="progress-bar bg-red" role="progressbar" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100" style="width: 72%;"></div>
                      </div>
                    </div>
                  </div>
                </li>
                <li class="list-group-item px-0">
                  <div class="row align-items-center">
                    <div class="col-auto">
                      <!-- Avatar -->
                      <a href="#" class="avatar rounded-circle">
                        <img alt="Image placeholder" src="<?= base_url('assets/assets/img/theme/react.jpg') ?>">
                      </a>
                    </div>
                    <div class="col">
                      <h5>React Material Dashboard</h5>
                      <div class="progress progress-xs mb-0">
                        <div class="progress-bar bg-teal" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width: 90%;"></div>
                      </div>
                    </div>
                  </div>
                </li>
                <li class="list-group-item px-0">
                  <div class="row align-items-center">
                    <div class="col-auto">
                      <!-- Avatar -->
                      <a href="#" class="avatar rounded-circle">
                        <img alt="Image placeholder" src="<?= base_url('assets/assets/img/theme/vue.jpg') ?>">
                      </a>
                    </div>
                    <div class="col">
                      <h5>Vue Paper UI Kit PRO</h5>
                      <div class="progress progress-xs mb-0">
                        <div class="progress-bar bg-green" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
                      </div>
                    </div>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  
  <!-- Core -->
  <script src="<?= site_url('assets/assets/vendor/jquery/dist/jquery.min.js') ?>"></script>
  <script src="<?= site_url('assets/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js') ?>"></script> 
  <script src="<?= site_url('assets/assets/vendor/js-cookie/js.cookie.js') ?>"></script>

  <script src="<?= site_url('assets/assets/vendor/bootstrap-notify/bootstrap-notify.min.js') ?>"></script>

  <script type="text/javascript">
    $(document).ready(function() {
      get_profile();
      function get_profile() {
        var username = '<?= $this->uri->segment(2) ?>';
        $.ajax({
          url: '<?= site_url("petugas/Pembayaran/getProfilePelangganByUsername") ?>',
          type:'POST',
          data:{username:username},
          dataType: 'JSON',
          success:function (data) {
            console.log(data);
            if (data.status == 1) {
              status = 'Aktif';
            }else{
              status = 'Tidak Aktif';
            }

            if (data.foto != null) {
              foto = '<?= site_url("assets/assets/img/users/pelanggan/") ?>'+data.foto;
            }

            $('#link-foto').attr('href', foto);
            $('#foto-card').attr('src', foto);
            $('#nama-card').html(data.nama_lengkap);
            $('#umur-card').html(data.umur);
            $('#tempat-tanggal-lahir-card').html(data.tempat_lahir+', '+data.tanggal_lahir);
          }
        });
      }
    });
  </script>
</body>

</html>