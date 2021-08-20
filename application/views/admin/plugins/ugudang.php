
<script type="text/javascript">

	var table;
	$(document).ready(function() {
		
		 // $('#table-gudang').scrollbar();

		table = $('#table-gudang').DataTable({
			"processing": true, 
            "serverSide": true,
            "scrollX": true,
            "fixedColumns": {
            	 "leftColumns": 1,
            	 "rightColumns": 1
            },
            // "responsive": true,
            // "lengthChange": false,
            "order": [],
            "autoWidth" : true,
             
            "ajax": {
                "url": "<?= base_url('admin/MasterData/get_gudang')?>",
                "type": "POST"
            },

            "language": {
		        "paginate": {
		            "previous": '<i class="fas fa-angle-left"></i>',
      				"next": '<i class="fas fa-angle-right"></i>'
		        },
		        "aria": {
		            "paginate": {
		                "previous": 'Previous',
		                "next":     'Next'
		            }
		        }
		    },
		});

		function reload_table() {
			table.ajax.reload(null, false);
		}


		function actionData(formData, action) {
			$.ajax({
				url: '<?= base_url("admin/MasterData/") ?>'+action+'',
				type: 'POST',
				dataType: 'JSON',
				data: formData,
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
						$('#modal-'+action).modal('hide');
	            		$('#form-'+action)[0].reset();
					}
				}
			});
		}

		$('#form-addGudang').submit(function() {
			
			if ($('[name="konf_password"]').val() != $('[name="password"]').val()) {
            	$('.notSamePassword').removeAttr('hidden');
            	$('[name="konf_password"]').focus();

            	return false;
            }else{
            	var formData = new FormData();
	            formData.append('username', $('[name="username"]').val()); 
	            formData.append('password', $('[name="password"]').val()); 
	            formData.append('nama_lengkap', $('[name="nama_lengkap"]').val()); 
	            formData.append('email', $('[name="email"]').val()); 
	            formData.append('hp', $('[name="hp"]').val()); 
	            formData.append('jenis_kelamin', $('[name="jenis_kelamin"]').val()); 
	            formData.append('tempat_lahir', $('[name="tempat_lahir"]').val()); 
	            formData.append('tanggal_lahir', $('[name="tanggal_lahir"]').val()); 
	            formData.append('alamat', $('[name="alamat"]').val()); 

            	actionData(formData, 'addGudang');
            	reload_table();

            	return false;
            }
		});

		$('#form-updateGudang').submit(function() {
			
			var formData = new FormData();
            formData.append('id', $('[name="id_update"]').val()); 
            formData.append('username', $('[name="username_update"]').val()); 
            formData.append('nama_lengkap', $('[name="nama_lengkap_update"]').val()); 
            formData.append('email', $('[name="email_update"]').val()); 
            formData.append('hp', $('[name="hp_update"]').val()); 
            formData.append('jenis_kelamin', $('[name="jenis_kelamin_update"]:checked').val()); 
            formData.append('tempat_lahir', $('[name="tempat_lahir_update"]').val()); 
            formData.append('tanggal_lahir', $('[name="tanggal_lahir_update"]').val()); 
            formData.append('alamat', $('[name="alamat_update"]').val()); 

        	actionData(formData, 'updateGudang');
        	reload_table();

        	return false;
		});

		$('#form-deleteGudang').submit(function() {
			var formData = new FormData();
            formData.append('id', $('[name="id_gudang_delete"]').val()); 
			
			actionData(formData, 'deleteGudang');
        	reload_table();

        	return false;
		});

		$('#table-data-gudang').on('click', '.delete-data', function() {
			var id = $(this).attr('data-id');
			var nama = $(this).attr('data-nama');
			
			$('#gudang-delete').html(nama);
			$('[name="id_gudang_delete"]').val(id);

			$('#modal-deleteGudang').modal('show');
		});

		$('#table-data-gudang').on('click', '.edit-data', function() {
			var id = $(this).attr('data-id');
			$.ajax({
				url: '<?= base_url("admin/MasterData/getGudangById") ?>',
				type: 'POST',
				dataType: 'JSON',
				data:{id:id},
				success:function (data) {
					
					$('[name="id_update"]').val(id);
					$('[name="nama_lengkap_update"]').val(data.nama_lengkap);
					$('[name="username_update"]').val(data.username);
					$('[name="email_update"]').val(data.email);
					$('[name="hp_update"]').val(data.hp);
					$('[name="tempat_lahir_update"]').val(data.tempat_lahir);
					$('[name="tanggal_lahir_update"]').val(data.tanggal_lahir);
					$('[name="alamat_update"]').val(data.alamat);
					// $('[name="jenis_kelamin_update"]').val(data.jenis_kelamin).trigger('change');

					if(data.jenis_kelamin == 'L'){
						$('#laki-laki_update').attr('checked', true);
					}else{
						$('#perempuan_update').attr('checked', true)
					}
					
					$('#modal-updateGudang').modal('show');
				}
			});
		});


	});
</script>
<script src="<?= site_url('assets/assets/vendor/datatables.net/js/jquery.dataTables.min.js') ?>"></script>
<script src="<?= site_url('assets/assets/vendor/datatables.net-bs4/js/dataTables.bootstrap4.min.js') ?>"></script>
<script src="<?= site_url('assets/assets/vendor/datatables.net-responsive-bs4/js/dataTables.responsive.min.js') ?>"></script>
<script src="<?= site_url('assets/assets/vendor/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') ?>"></script>
<script src="<?= site_url('assets/assets/vendor/select2/dist/js/select2.min.js') ?>"></script>
<script src="https://cdn.datatables.net/fixedcolumns/3.3.3/js/dataTables.fixedColumns.min.js"></script>
<script src="<?= site_url('assets/assets/vendor/bootstrap-notify/bootstrap-notify.min.js') ?>"></script>

<script src="<?= site_url('assets/assets/js/argon.js?v=1.1.0') ?>"></script>

</body>
</html>