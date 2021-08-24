
<script type="text/javascript">

	var table;
	$(document).ready(function() {
	

		table = $('#table-barang').DataTable({
			"processing": true, 
            "serverSide": true,
            // "scrollX": true,
            // "fixedColumns": {
            // 	 "leftColumns": 1,
            // 	 "rightColumns": 2
            // },
            "responsive": true,
            // "lengthChange": false,
            "order": [],
            "autoWidth" : true,
             
            "ajax": {
                "url": "<?= base_url('admin/MasterData/get_barang')?>",
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

		$('#form-addBarang').submit(function() {
			
        	var formData = new FormData();
            formData.append('kode_barang', $('[name="kode_barang"]').val()); 
            formData.append('nama_barang', $('[name="nama_barang"]').val()); 
            formData.append('harga_barang', $('[name="harga_barang"]').val()); 
            formData.append('stok_barang', $('[name="stok_barang"]').val()); 

        	actionData(formData, 'addBarang');

        	setTimeout(function() {
        		reload_table();
        	}, 600);

        	return false;
		});

		$('#form-updateBarang').submit(function() {
			
			var formData = new FormData();
            formData.append('id', $('[name="id_update"]').val()); 
           	formData.append('kode_barang', $('[name="kode_barang_update"]').val()); 
            formData.append('nama_barang', $('[name="nama_barang_update"]').val()); 
            formData.append('harga_barang', $('[name="harga_barang_update"]').val()); 
            formData.append('stok_barang', $('[name="stok_barang_update"]').val()); 

        	actionData(formData, 'updateBarang');

        	setTimeout(function() {
        		reload_table();
        	}, 600);

        	return false;
		});

		$('#form-deleteBarang').submit(function() {
			var formData = new FormData();
            formData.append('id', $('[name="id_barang_delete"]').val()); 
			
			actionData(formData, 'deleteBarang');
        	reload_table();

        	return false;
		});

		$('#table-data-barang').on('click', '.delete-data', function() {
			var id = $(this).attr('data-id');
			var nama = $(this).attr('data-nama');
			
			$('#barang-delete').html(nama);
			$('[name="id_barang_delete"]').val(id);

			$('#modal-deleteBarang').modal('show');
		});

		$('#table-data-barang').on('click', '.edit-data', function() {
			var id = $(this).attr('data-id');
			$.ajax({
				url: '<?= base_url("admin/MasterData/getBarangById") ?>',
				type: 'POST',
				dataType: 'JSON',
				data:{id:id},
				success:function (data) {
					
					$('[name="id_update"]').val(id);
					$('[name="kode_barang_update"]').val(data.kode_barang);
					$('[name="harga_barang_update"]').val(data.harga_barang);
					$('[name="stok_barang_update"]').val(data.stok_barang);
					$('[name="nama_barang_update"]').val(data.nama_barang);
					
					$('#modal-updateBarang').modal('show');
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