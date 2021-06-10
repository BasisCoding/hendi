<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class MasterData extends CI_Controller {

		public function __construct()
		{
			parent::__construct();
			$this->load->model('MasterModel');
		}
	
		public function datapetugas()
		{
			$def['title'] = 'SISRES | Data Petugas';
			$def['breadcrumb'] = 'Data Petugas';

			$this->load->view('partials/head', $def);
			$this->load->view('partials/navbar');
			$this->load->view('partials/breadcrumb', $def);
			$this->load->view('admin/datapetugas');
			$this->load->view('partials/footer');
			$this->load->view('admin/plugins/datapetugas');
		}

		public function getPetugasById()
		{
			$id = $this->input->get('id');
			$data = $this->MasterModel->getPetugasById($id)->row();
			echo json_encode($data);
		}

		public function get_petugas()
		{
			$list = $this->MasterModel->get_petugas();

			$data = array();
			$no = $_POST['start'];

			foreach ($list as $ls) {

				if ($ls->foto == NULL) {
					$foto = 'default.png';
				}else{
					$foto = $ls->foto;
				}

				$no++;
				$row = array();
				$row[] = $no;
				$row[] = '<a href="'.site_url('assets/assets/img/users/'.$foto).'" target="_blank"><img src="'.site_url('assets/assets/img/users/'.$foto).'" width="20" height="20"></a>';
				$row[] = $ls->username;
				$row[] = $ls->nama_lengkap;
				$row[] = $ls->email;
				$row[] = $ls->hp;
				$row[] = $ls->jenis_kelamin;
				$row[] = $ls->tempat_lahir.', '.$ls->tanggal_lahir;

				$row[] = '
					<div class="btn-group">
						<button class="btn btn-default btn-sm edit-data" data-username="'.$ls->username.'" data-nama="'.$ls->nama_lengkap.'" data-id="'.$ls->id.'"><span class="fas fa-user-edit"></span></button>
						<button data-id="'.$ls->id.'" data-nama="'.$ls->nama_lengkap.'" class="btn btn-danger delete-data btn-sm"><span class="fas fa-times"></span></button>
					</div>';

				$data[] = $row;
			}

			$output = array(
				"draw" => $_POST['draw'],
	            "recordsTotal" => $this->MasterModel->count_all_petugas(),
	            "recordsFiltered" => $this->MasterModel->count_filtered_petugas(),
	            "data" => $data
			);

			echo json_encode($output);
		}

		public function addPetugas()
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
			$data['level'] = 2;
			$data['status'] = 1;

			$config['upload_path'] = './assets/assets/img/users';
	        $config['allowed_types'] = 'gif|jpg|png|jpeg';
	        $config['max_size'] = '1024';
	        $config['overwrite'] = true;
	        $config['file_name'] = $data['username'];
	        $this->load->library('upload', $config);

	        if($this->upload->do_upload("foto")){
				$data['foto'] = $this->upload->file_name;
			} else {
				$data['foto'] = NULL;
			}

			$act = $this->MasterModel->addPetugas($data);

			if ($act) {
				$response = array(
					'type' => 'success',
					'message' => 'Data petugas berhasil dikirim'
				);
			}else{
				$response = array(
					'type' => 'danger',
					'message' => 'Data Petugas gagal dikirim'
				);
			}

			echo json_encode($response);

		}

		public function updatePetugas()
		{
			$id = $this->input->post('id');
			$username = $this->input->post('username');
			$foto_lama = $this->input->post('foto_lama');

			$data['nama_lengkap'] = $this->input->post('nama_lengkap');
			$data['email'] = $this->input->post('email');
			$data['hp'] = $this->input->post('hp');
			$data['jenis_kelamin'] = $this->input->post('jenis_kelamin');
			$data['tempat_lahir'] = $this->input->post('tempat_lahir');
			$data['tanggal_lahir'] = $this->input->post('tanggal_lahir');
			$data['alamat'] = $this->input->post('alamat');

			$config['upload_path'] = './assets/assets/img/users';
	        $config['allowed_types'] = 'gif|jpg|png|jpeg';
	        $config['max_size'] = '1024';
	        $config['overwrite'] = true;
	        $config['file_name'] = $username;
	        $this->load->library('upload', $config);

	        if($this->upload->do_upload("foto")){
				$data['foto'] = $this->upload->file_name;
	        	@unlink('./assets/assets/img/users/'.$foto_lama);
			}else{
				$data['foto'] = $foto_lama;
			}

			$act = $this->MasterModel->updatePetugas($id, $data);

			if ($act) {
				$response = array(
					'type' => 'success',
					'message' => 'Data petugas berhasil dikirim'
				);
			}else{
				$response = array(
					'type' => 'danger',
					'message' => 'Data Petugas gagal dikirim'
				);
			}

			echo json_encode($response);

		}
	
	}
	
	/* End of file MasterData.php */
	/* Location: ./application/controllers/admin/MasterData.php */
?>