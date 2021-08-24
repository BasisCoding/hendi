<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class MasterData extends CI_Controller {

		public function __construct()
		{
			parent::__construct();
			$this->load->model('UPelangganModel');
			$this->load->model('UPengirimanModel');
			$this->load->model('UGudangModel');
			$this->load->model('USalesmanModel');
			$this->load->model('BarangModel');
		}
	// Get User Group

		public function getUserGroup()
		{
			$data = $this->db->get('users_group')->result();
			echo json_encode($data);
		}
	
	// Function Pelanggan
		
		public function pelanggan()
		{
			$def['title'] = SHORT_SITE_URL.' | Data Pelanggan';
			$def['breadcrumb'] = 'Data Pelanggan';

			$this->load->view('partials/head', $def);
			$this->load->view('partials/navbar');
			$this->load->view('partials/breadcrumb', $def);
			$this->load->view('admin/pelanggan');
			$this->load->view('partials/footer');
			$this->load->view('admin/plugins/pelanggan');
		}

		public function getPelangganById()
		{
			$id = $this->input->post('id');
			$data = $this->UPelangganModel->getPelangganById($id)->row();
			echo json_encode($data);
		}

		public function get_pelanggan()
		{
			$list = $this->UPelangganModel->get_datatables();

			$data = array();
			$no = $_POST['start'];

			foreach ($list as $ls) {

				$no++;
				$row = array();
				$row[] = $no;
				
				$row[] = $ls->nama_lengkap;
				$row[] = $ls->email;
				$row[] = $ls->hp;
				$row[] = $ls->jenis_kelamin;
				$row[] = $ls->tempat_lahir.', '.$ls->tanggal_lahir;

				$row[] = '
					<div class="btn-group">
						<button class="btn btn-default btn-sm edit-data" data-nama="'.$ls->nama_lengkap.'" data-id="'.$ls->id.'"><span class="fas fa-users-cog"></span></button>
						<button data-id="'.$ls->id.'" data-nama="'.$ls->nama_lengkap.'" class="btn btn-danger delete-data btn-sm"><span class="fas fa-times"></span></button>
					</div>';

				$data[] = $row;
			}

			$output = array(
				"draw" => $_POST['draw'],
	            "recordsTotal" => $this->UPelangganModel->count_all(),
	            "recordsFiltered" => $this->UPelangganModel->count_filtered(),
	            "data" => $data
			);

			echo json_encode($output);
		}

		public function addPelanggan()
		{
			$data['nama_lengkap'] = $this->input->post('nama_lengkap');
			$data['email'] = $this->input->post('email');
			$data['hp'] = $this->input->post('hp');
			$data['jenis_kelamin'] = $this->input->post('jenis_kelamin');
			$data['tempat_lahir'] = $this->input->post('tempat_lahir');
			$data['tanggal_lahir'] = $this->input->post('tanggal_lahir');
			$data['alamat'] = $this->input->post('alamat');
			$data['status'] = 1;


			$act = $this->UPelangganModel->addPelanggan($data);

			if ($act) {
				$response = array(
					'type' => 'success',
					'message' => 'Data Pelanggan berhasil dikirim'
				);
			}else{
				$response = array(
					'type' => 'danger',
					'message' => 'Data Pelanggan gagal dikirim'
				);
			}

			echo json_encode($response);
		}

		public function updatePelanggan()
		{
			$id = $this->input->post('id');

			$data['nama_lengkap'] = $this->input->post('nama_lengkap');
			$data['email'] = $this->input->post('email');
			$data['hp'] = $this->input->post('hp');
			$data['jenis_kelamin'] = $this->input->post('jenis_kelamin');
			$data['tempat_lahir'] = $this->input->post('tempat_lahir');
			$data['tanggal_lahir'] = $this->input->post('tanggal_lahir');
			$data['alamat'] = $this->input->post('alamat');
			
			$act = $this->UPelangganModel->updatePelanggan($id, $data);

			if ($act) {
				$response = array(
					'type' => 'success',
					'message' => 'Data Pelanggan Berhasil Diubah'
				);
			}else{
				$response = array(
					'type' => 'danger',
					'message' => 'Data Pelanggan Gagal Diubah'
				);
			}

			echo json_encode($response);
		}

		public function deletePelanggan()
		{
			$id = $this->input->post('id');
			$data['status'] = 0;

			$act = $this->UPelangganModel->updatePelanggan($id, $data);

			if ($act) {
				$response = array(
					'type' => 'success',
					'message' => 'Data Pelanggan Berhasil dihapus'
				);
			}else{
				$response = array(
					'type' => 'danger',
					'message' => 'Data Pelanggan Gagal dihapus'
				);
			}

			echo json_encode($response);
		}

	// End Function Pelanggan




	// End Function Pengiriman

		public function pengiriman()
		{
			$def['title'] = SHORT_SITE_URL.' | Data User Pengiriman';
			$def['breadcrumb'] = 'Data User Pengiriman';

			$this->load->view('partials/head', $def);
			$this->load->view('partials/navbar');
			$this->load->view('partials/breadcrumb', $def);
			$this->load->view('admin/upengiriman');
			$this->load->view('partials/footer');
			$this->load->view('admin/plugins/upengiriman');
		}

		public function getPengirimanById()
		{
			$id = $this->input->post('id');
			$data = $this->UPengirimanModel->getPengirimanById($id)->row();
			echo json_encode($data);
		}

		public function get_pengiriman()
		{
			$list = $this->UPengirimanModel->get_datatables();

			$data = array();
			$no = $_POST['start'];

			foreach ($list as $ls) {

				$no++;
				$row = array();
				$row[] = $no;
				
				$row[] = $ls->username;
				$row[] = $ls->nama_lengkap;
				$row[] = $ls->email;
				$row[] = $ls->hp;
				$row[] = $ls->jenis_kelamin;
				$row[] = $ls->tempat_lahir.', '.$ls->tanggal_lahir;

				$row[] = '
					<div class="btn-group">
						<button class="btn btn-default btn-sm edit-data" data-username="'.$ls->username.'" data-nama="'.$ls->nama_lengkap.'" data-id="'.$ls->id.'"><span class="fas fa-users-cog"></span></button>
						<button data-id="'.$ls->id.'" data-nama="'.$ls->nama_lengkap.'" class="btn btn-danger delete-data btn-sm"><span class="fas fa-times"></span></button>
					</div>';

				$data[] = $row;
			}

			$output = array(
				"draw" => $_POST['draw'],
	            "recordsTotal" => $this->UPengirimanModel->count_all(),
	            "recordsFiltered" => $this->UPengirimanModel->count_filtered(),
	            "data" => $data
			);

			echo json_encode($output);
		}

		public function addPengiriman()
		{
			$data['username'] = $this->input->post('username');
			$data['password'] = hash('sha512', $this->input->post('password').config_item('encryption_key'));
			$data['nama_lengkap'] = $this->input->post('nama_lengkap');
			$data['email'] = $this->input->post('email');
			$data['hp'] = $this->input->post('hp');
			$data['jenis_kelamin'] = $this->input->post('jenis_kelamin');
			$data['tempat_lahir'] = $this->input->post('tempat_lahir');
			$data['tanggal_lahir'] = $this->input->post('tanggal_lahir');
			$data['alamat'] = $this->input->post('alamat');
			$data['level'] = 5;
			$data['status'] = 1;

			$validate = $this->UPengirimanModel->getPengirimanByUsername($data['username']);
			if ($validate->num_rows() > 0) {
				$response = array(
					'type' => 'danger',
					'message' => 'Username sudah tersedia silahkan coba lagi !!'
				);
			}else{

				$act = $this->UPengirimanModel->addPengiriman($data);

				if ($act) {
					$response = array(
						'type' => 'success',
						'message' => 'Data User Pengiriman berhasil dikirim'
					);
				}else{
					$response = array(
						'type' => 'danger',
						'message' => 'Data User Pengiriman gagal dikirim'
					);
				}
			}
			

			echo json_encode($response);
		}

		public function updatePengiriman()
		{
			$id = $this->input->post('id');
			$username = $this->input->post('username');

			$data['nama_lengkap'] = $this->input->post('nama_lengkap');
			$data['email'] = $this->input->post('email');
			$data['hp'] = $this->input->post('hp');
			$data['jenis_kelamin'] = $this->input->post('jenis_kelamin');
			$data['tempat_lahir'] = $this->input->post('tempat_lahir');
			$data['tanggal_lahir'] = $this->input->post('tanggal_lahir');
			$data['alamat'] = $this->input->post('alamat');
			
			$act = $this->UPengirimanModel->updatePengiriman($id, $data);

			if ($act) {
				$response = array(
					'type' => 'success',
					'message' => 'Data User Pengiriman Berhasil Diubah'
				);
			}else{
				$response = array(
					'type' => 'danger',
					'message' => 'Data User Pengiriman Gagal Diubah'
				);
			}

			echo json_encode($response);
		}

		public function deletePengiriman()
		{
			$id = $this->input->post('id');
			$data['status'] = 0;

			$act = $this->UPengirimanModel->updatePengiriman($id, $data);

			if ($act) {
				$response = array(
					'type' => 'success',
					'message' => 'Data User Pengiriman Berhasil dihapus'
				);
			}else{
				$response = array(
					'type' => 'danger',
					'message' => 'Data User Pengiriman Gagal dihapus'
				);
			}

			echo json_encode($response);
		}

	// End Function Pengiriman




	// End Function Gudang

		public function gudang()
		{
			$def['title'] = SHORT_SITE_URL.' | Data User Gudang';
			$def['breadcrumb'] = 'Data User Gudang';

			$this->load->view('partials/head', $def);
			$this->load->view('partials/navbar');
			$this->load->view('partials/breadcrumb', $def);
			$this->load->view('admin/ugudang');
			$this->load->view('partials/footer');
			$this->load->view('admin/plugins/ugudang');
		}

		public function getGudangById()
		{
			$id = $this->input->post('id');
			$data = $this->UGudangModel->getGudangById($id)->row();
			echo json_encode($data);
		}

		public function get_gudang()
		{
			$list = $this->UGudangModel->get_datatables();

			$data = array();
			$no = $_POST['start'];

			foreach ($list as $ls) {

				$no++;
				$row = array();
				$row[] = $no;
				
				$row[] = $ls->username;
				$row[] = $ls->nama_lengkap;
				$row[] = $ls->email;
				$row[] = $ls->hp;
				$row[] = $ls->jenis_kelamin;
				$row[] = $ls->tempat_lahir.', '.$ls->tanggal_lahir;

				$row[] = '
					<div class="btn-group">
						<button class="btn btn-default btn-sm edit-data" data-username="'.$ls->username.'" data-nama="'.$ls->nama_lengkap.'" data-id="'.$ls->id.'"><span class="fas fa-users-cog"></span></button>
						<button data-id="'.$ls->id.'" data-nama="'.$ls->nama_lengkap.'" class="btn btn-danger delete-data btn-sm"><span class="fas fa-times"></span></button>
					</div>';

				$data[] = $row;
			}

			$output = array(
				"draw" => $_POST['draw'],
	            "recordsTotal" => $this->UGudangModel->count_all(),
	            "recordsFiltered" => $this->UGudangModel->count_filtered(),
	            "data" => $data
			);

			echo json_encode($output);
		}

		public function addGudang()
		{
			$data['username'] = $this->input->post('username');
			$data['password'] = hash('sha512', $this->input->post('password').config_item('encryption_key'));
			$data['nama_lengkap'] = $this->input->post('nama_lengkap');
			$data['email'] = $this->input->post('email');
			$data['hp'] = $this->input->post('hp');
			$data['jenis_kelamin'] = $this->input->post('jenis_kelamin');
			$data['tempat_lahir'] = $this->input->post('tempat_lahir');
			$data['tanggal_lahir'] = $this->input->post('tanggal_lahir');
			$data['alamat'] = $this->input->post('alamat');
			$data['level'] = 3;
			$data['status'] = 1;

			$validate = $this->UGudangModel->getGudangByUsername($data['username']);
			if ($validate->num_rows() > 0) {
				$response = array(
					'type' => 'danger',
					'message' => 'Username sudah tersedia silahkan coba lagi !!'
				);
			}else{

				$act = $this->UGudangModel->addGudang($data);

				if ($act) {
					$response = array(
						'type' => 'success',
						'message' => 'Data User Gudang berhasil dikirim'
					);
				}else{
					$response = array(
						'type' => 'danger',
						'message' => 'Data User Gudang gagal dikirim'
					);
				}
			}
			

			echo json_encode($response);
		}

		public function updateGudang()
		{
			$id = $this->input->post('id');
			$username = $this->input->post('username');

			$data['nama_lengkap'] = $this->input->post('nama_lengkap');
			$data['email'] = $this->input->post('email');
			$data['hp'] = $this->input->post('hp');
			$data['jenis_kelamin'] = $this->input->post('jenis_kelamin');
			$data['tempat_lahir'] = $this->input->post('tempat_lahir');
			$data['tanggal_lahir'] = $this->input->post('tanggal_lahir');
			$data['alamat'] = $this->input->post('alamat');
			
			$act = $this->UGudangModel->updateGudang($id, $data);

			if ($act) {
				$response = array(
					'type' => 'success',
					'message' => 'Data User Gudang Berhasil Diubah'
				);
			}else{
				$response = array(
					'type' => 'danger',
					'message' => 'Data User Gudang Gagal Diubah'
				);
			}

			echo json_encode($response);
		}

		public function deleteGudang()
		{
			$id = $this->input->post('id');
			$data['status'] = 0;

			$act = $this->UGudangModel->updateGudang($id, $data);

			if ($act) {
				$response = array(
					'type' => 'success',
					'message' => 'Data User Gudang Berhasil dihapus'
				);
			}else{
				$response = array(
					'type' => 'danger',
					'message' => 'Data User Gudang Gagal dihapus'
				);
			}

			echo json_encode($response);
		}
		
	// End Function Gudang




	// End Function Salesman

		public function salesman()
		{
			$def['title'] = SHORT_SITE_URL.' | Data User Salesman';
			$def['breadcrumb'] = 'Data User Salesman';

			$this->load->view('partials/head', $def);
			$this->load->view('partials/navbar');
			$this->load->view('partials/breadcrumb', $def);
			$this->load->view('admin/usalesman');
			$this->load->view('partials/footer');
			$this->load->view('admin/plugins/usalesman');
		}

		public function getSalesmanById()
		{
			$id = $this->input->post('id');
			$data = $this->USalesmanModel->getSalesmanById($id)->row();
			echo json_encode($data);
		}

		public function get_salesman()
		{
			$list = $this->USalesmanModel->get_datatables();

			$data = array();
			$no = $_POST['start'];

			foreach ($list as $ls) {

				$no++;
				$row = array();
				$row[] = $no;
				
				$row[] = $ls->username;
				$row[] = $ls->nama_lengkap;
				$row[] = $ls->email;
				$row[] = $ls->hp;
				$row[] = $ls->jenis_kelamin;
				$row[] = $ls->tempat_lahir.', '.$ls->tanggal_lahir;

				$row[] = '
					<div class="btn-group">
						<button class="btn btn-default btn-sm edit-data" data-username="'.$ls->username.'" data-nama="'.$ls->nama_lengkap.'" data-id="'.$ls->id.'"><span class="fas fa-users-cog"></span></button>
						<button data-id="'.$ls->id.'" data-nama="'.$ls->nama_lengkap.'" class="btn btn-danger delete-data btn-sm"><span class="fas fa-times"></span></button>
					</div>';

				$data[] = $row;
			}

			$output = array(
				"draw" => $_POST['draw'],
	            "recordsTotal" => $this->USalesmanModel->count_all(),
	            "recordsFiltered" => $this->USalesmanModel->count_filtered(),
	            "data" => $data
			);

			echo json_encode($output);
		}

		public function addSalesman()
		{
			$data['username'] = $this->input->post('username');
			$data['password'] = hash('sha512', $this->input->post('password').config_item('encryption_key'));
			$data['nama_lengkap'] = $this->input->post('nama_lengkap');
			$data['email'] = $this->input->post('email');
			$data['hp'] = $this->input->post('hp');
			$data['jenis_kelamin'] = $this->input->post('jenis_kelamin');
			$data['tempat_lahir'] = $this->input->post('tempat_lahir');
			$data['tanggal_lahir'] = $this->input->post('tanggal_lahir');
			$data['alamat'] = $this->input->post('alamat');
			$data['level'] = 4;
			$data['status'] = 1;

			$validate = $this->USalesmanModel->getSalesmanByUsername($data['username']);
			if ($validate->num_rows() > 0) {
				$response = array(
					'type' => 'danger',
					'message' => 'Username sudah tersedia silahkan coba lagi !!'
				);
			}else{

				$act = $this->USalesmanModel->addSalesman($data);

				if ($act) {
					$response = array(
						'type' => 'success',
						'message' => 'Data User Salesman berhasil dikirim'
					);
				}else{
					$response = array(
						'type' => 'danger',
						'message' => 'Data User Salesman gagal dikirim'
					);
				}
			}
			

			echo json_encode($response);
		}

		public function updateSalesman()
		{
			$id = $this->input->post('id');
			$username = $this->input->post('username');

			$data['nama_lengkap'] = $this->input->post('nama_lengkap');
			$data['email'] = $this->input->post('email');
			$data['hp'] = $this->input->post('hp');
			$data['jenis_kelamin'] = $this->input->post('jenis_kelamin');
			$data['tempat_lahir'] = $this->input->post('tempat_lahir');
			$data['tanggal_lahir'] = $this->input->post('tanggal_lahir');
			$data['alamat'] = $this->input->post('alamat');
			
			$act = $this->USalesmanModel->updateSalesman($id, $data);

			if ($act) {
				$response = array(
					'type' => 'success',
					'message' => 'Data User Salesman Berhasil Diubah'
				);
			}else{
				$response = array(
					'type' => 'danger',
					'message' => 'Data User Salesman Gagal Diubah'
				);
			}

			echo json_encode($response);
		}

		public function deleteSalesman()
		{
			$id = $this->input->post('id');
			$data['status'] = 0;

			$act = $this->USalesmanModel->updateSalesman($id, $data);

			if ($act) {
				$response = array(
					'type' => 'success',
					'message' => 'Data User Salesman Berhasil dihapus'
				);
			}else{
				$response = array(
					'type' => 'danger',
					'message' => 'Data User Salesman Gagal dihapus'
				);
			}

			echo json_encode($response);
		}
		
	// End Function Gudang


	// Function Barang
		
		public function barang()
		{
			$def['title'] = SHORT_SITE_URL.' | Data Barang';
			$def['breadcrumb'] = 'Data Barang';

			$this->load->view('partials/head', $def);
			$this->load->view('partials/navbar');
			$this->load->view('partials/breadcrumb', $def);
			$this->load->view('admin/barang');
			$this->load->view('partials/footer');
			$this->load->view('admin/plugins/barang');
		}

		public function getBarangById()
		{
			$id = $this->input->post('id');
			$data = $this->db->get_where('barang', array('id' => $id))->row();
			echo json_encode($data);
		}

		public function get_barang()
		{
			$list = $this->BarangModel->get_datatables();

			$data = array();
			$no = $_POST['start'];

			foreach ($list as $ls) {

				$no++;
				$row = array();
				$row[] = $no;
				
				$row[] = $ls->kode_barang;
				$row[] = $ls->nama_barang;
				$row[] = $ls->harga_barang;
				$row[] = $ls->stok_barang;

				$row[] = '
					<div class="btn-group">
						<button class="btn btn-default btn-sm edit-data" data-id="'.$ls->id.'"><span class="fas fa-users-cog"></span></button>
						<button data-id="'.$ls->id.'" data-nama="'.$ls->nama_barang.'" class="btn btn-danger delete-data btn-sm"><span class="fas fa-times"></span></button>
					</div>';

				$data[] = $row;
			}

			$output = array(
				"draw" => $_POST['draw'],
	            "recordsTotal" => $this->BarangModel->count_all(),
	            "recordsFiltered" => $this->BarangModel->count_filtered(),
	            "data" => $data
			);

			echo json_encode($output);
		}

		public function addBarang()
		{
			$data['kode_barang'] = $this->input->post('kode_barang');
			$data['nama_barang'] = $this->input->post('nama_barang');
			$data['harga_barang'] = $this->input->post('harga_barang');
			$data['stok_barang'] = $this->input->post('stok_barang');

			$act = $this->BarangModel->addBarang($data);

			if ($act) {
				$response = array(
					'type' => 'success',
					'message' => 'Data Barang berhasil dikirim'
				);
			}else{
				$response = array(
					'type' => 'danger',
					'message' => 'Data Barang gagal dikirim'
				);
			}

			echo json_encode($response);
		}

		public function updateBarang()
		{
			$id = $this->input->post('id');

			$data['kode_barang'] = $this->input->post('kode_barang');
			$data['nama_barang'] = $this->input->post('nama_barang');
			$data['harga_barang'] = $this->input->post('harga_barang');
			$data['stok_barang'] = $this->input->post('stok_barang');
			$data['update_at'] = date('Y-m-d H:i:s');
			
			$act = $this->BarangModel->updateBarang($id, $data);

			if ($act) {
				$response = array(
					'type' => 'success',
					'message' => 'Data Barang Berhasil Diubah'
				);
			}else{
				$response = array(
					'type' => 'danger',
					'message' => 'Data Barang Gagal Diubah'
				);
			}

			echo json_encode($response);
		}

		public function deleteBarang()
		{
			$id = $this->input->post('id');

			$act = $this->BarangModel->deleteBarang($id);

			if ($act) {
				$response = array(
					'type' => 'success',
					'message' => 'Data Barang Berhasil dihapus'
				);
			}else{
				$response = array(
					'type' => 'danger',
					'message' => 'Data Barang Gagal dihapus'
				);
			}

			echo json_encode($response);
		}

	// End Function Barang
	}
	
	/* End of file MasterData.php */
	/* Location: ./application/controllers/admin/MasterData.php */
?>