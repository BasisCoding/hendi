
<script type="text/javascript">

	var table;
	$(document).ready(function() {
		selectPelanggan();
		selectBarang();
		getKodePesanan();
		// $('#table-pesanan').scrollbar();
		function getKodePesanan() {
			var kode_pesanan = $('[name="kode_pesanan"]')
			$.ajax({
				url: '<?= base_url("salesman/Pesanan/getKodePesanan") ?>',
				type: 'GET',
				dataType: 'JSON',
				success:function (data) {
					kode_pesanan.val(data);
				}
			});
		}

		function selectPelanggan() {
			var selectPelanggan = $('.id_pelanggan')
			$.ajax({
				url: '<?= base_url("salesman/Pesanan/selectPelanggan") ?>',
				type: 'GET',
				dataType: 'JSON',
				success:function (data) {
					for (var i = 0; i < data.length; i++) {
						selectPelanggan.append('<option class="font-weight-bold" value="'+data[i].id+'">'+data[i].nama_lengkap+'</option>');
					}
				}
			});
		}

		function selectBarang() {
			var selectBarang = $('.id_barang')
			$.ajax({
				url: '<?= base_url("salesman/Pesanan/selectBarang") ?>',
				type: 'GET',
				dataType: 'JSON',
				success:function (data) {
					for (var i = 0; i < data.length; i++) {
						selectBarang.append('<option class="font-weight-bold" value="'+data[i].id+'" data-harga="'+data[i].harga_barang+'">'+data[i].kode_barang+' | '+data[i].nama_barang+'</option>');
					}
				}
			});
		}

		$('.id_pelanggan').select2({
			placeholder: "Pilih Pelanggan",
		});

		$('.id_barang').select2({
			placeholder: "Pilih Barang",
		});

		$('.id_barang').on('change', function() {
			$('[name="harga_barang"]').val($('[name="id_barang"] option:selected').attr('data-harga'));
		});

		table = $('#table-pesanan').DataTable({
			"processing": true, 
            "serverSide": true,
            "scrollX": true,
            "fixedColumns": {
            	 "leftColumns": 1,
            	 "rightColumns": 2
            },
            // "responsive": true,
            // "lengthChange": false,
            "order": [],
            "autoWidth" : true,
             
            "ajax": {
                "url": "<?= base_url('salesman/Pesanan/get_pesanan')?>",
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
				url: '<?= base_url("salesman/Pesanan/") ?>'+action+'',
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

		$('#form-addPesanan').submit(function() {
			
        	var formData = new FormData();
            formData.append('kode_pesanan', $('[name="kode_pesanan"]').val()); 
            formData.append('id_pelanggan', $('[name="id_pelanggan"]').val()); 
            formData.append('id_barang', $('[name="id_barang"]').val()); 
            formData.append('harga_barang', $('[name="harga_barang"]').val()); 
            formData.append('jumlah_barang', $('[name="jumlah_barang"]').val()); 

        	actionData(formData, 'addPesanan');

        	setTimeout(function() {
        		reload_table();
        	}, 600);

        	return false;
		});

		$('#form-updatePesanan').submit(function() {
			
			var formData = new FormData();
            formData.append('id', $('[name="id_update"]').val()); 
            formData.append('kode_pesanan', $('[name="kode_pesanan_update"]').val()); 
            formData.append('id_pelanggan', $('[name="id_pelanggan_update"]').val()); 
            formData.append('id_barang', $('[name="id_barang_update"]').val()); 
            formData.append('harga_barang', $('[name="harga_barang_update"]').val()); 
            formData.append('jumlah_barang', $('[name="jumlah_barang_update"]').val()); 

        	actionData(formData, 'updatePesanan');

        	setTimeout(function() {
        		reload_table();
        	}, 600);

        	return false;
		});

		$('#form-deletePesanan').submit(function() {
			var formData = new FormData();
            formData.append('id', $('[name="id_pesanan_delete"]').val()); 
			
			actionData(formData, 'deletePesanan');
        	reload_table();

        	return false;
		});

		$('#table-data-pesanan').on('click', '.delete-data', function() {
			var id = $(this).attr('data-id');
			var kode = $(this).attr('data-kode');
			
			$('#pesanan-delete').html(kode);
			$('[name="id_pesanan_delete"]').val(id);

			$('#modal-deletePesanan').modal('show');
		});

		$('#table-data-pesanan').on('click', '.edit-data', function() {
			var id = $(this).attr('data-id');
			$.ajax({
				url: '<?= base_url("salesman/Pesanan/getPesananById") ?>',
				type: 'POST',
				dataType: 'JSON',
				data:{id:id},
				success:function (data) {
					
					$('[name="id_update"]').val(id);
					$('[name="kode_pesanan_update"]').val(data.kode_pesanan);
					$('[name="id_pelanggan_update"]').val(data.id_pelanggan).trigger('change');
					$('[name="id_barang_update"]').val(data.id_barang).trigger('change');
					$('[name="harga_barang_update"]').val(data.harga_barang);
					$('[name="jumlah_barang_update"]').val(data.jumlah_barang);
					
					$('#modal-updatePesanan').modal('show');
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