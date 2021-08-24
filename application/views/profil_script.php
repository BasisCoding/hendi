
<script type="text/javascript">

	$(document).ready(function() {
		getProfil();
		function getProfil() {
			$.ajax({
				url: '<?= site_url("Profil/getProfil") ?>',
				type: 'GET',
				dataType: 'JSON',
				success:function (data) {
					$('[name="username"]').val(data.username);
					$('[name="nama_lengkap"]').val(data.nama_lengkap);
					$('[name="email"]').val(data.email);
					$('[name="hp"]').val(data.hp);
					$('[name="jenis_kelamin"]').val(data.jenis_kelamin);
					$('[name="tempat_lahir"]').val(data.tempat_lahir);
					$('[name="tanggal_lahir"]').val(data.tanggal_lahir);
					$('[name="alamat"]').val(data.alamat);
				}
			});
			
		}

		$('#form-updateProfil').on('submit', function() {
			var data = new FormData(this);

			$.ajax({
				url: '<?= base_url("Profil/updateProfil") ?>',
				type: 'POST',
				dataType: 'JSON',
				data: data,
		        processData: false,
		        contentType: false,
				success:function (response) {
					$.notify({
	                    icon: 'ni ni-bell-55',
	                    message:response.message
	                },{
	                    type:response.type,
	                    z_index:2000,
	                    placement: {
	                      from: "top",
	                      align: "right"
	                	},
	                    animate: {
	                      enter: 'animated fadeInDown',
	                      exit: 'animated fadeOutUp'
	                 	}
	                });

	                if (response.type == 'success') {
	                	setTimeout(function() {
	                		window.location.replace('logout');
	                	}, 100);
	                }
				}

			});
			return false;        	
		});

	});
</script>
<script src="<?= site_url('assets/assets/vendor/bootstrap-notify/bootstrap-notify.min.js') ?>"></script>

<script src="<?= site_url('assets/assets/js/argon.js?v=1.1.0') ?>"></script>

</body>
</html>