<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Profil extends CI_Controller {

		public function __construct()
		{
			parent::__construct();
			$this->load->model('UserModel');
		}
	
		public function index()
		{
			$def['title'] = SHORT_SITE_URL.' | Profil';
			$def['breadcrumb'] = 'Profil';

			$this->load->view('partials/head', $def);
			$this->load->view('partials/navbar');
			$this->load->view('partials/breadcrumb', $def);
			$this->load->view('profil');
			$this->load->view('partials/footer');
			$this->load->view('profil_script');
		}

		public function getProfil()
		{
			$id = $this->session->userdata('id');
			$table = $this->session->userdata('link');

			$get = $this->db->get_where($table, array('id' => $id))->row();

			echo json_encode($get);
		}

		public function updateProfil()
		{
			$data['nama_lengkap'] = $this->input->post('nama_lengkap');
			$data['username'] = $this->input->post('username');
			$data['password'] = hash('sha512', $this->input->post('password').config_item('encryption_key'));
			$data['email'] = $this->input->post('email');
			$data['hp'] = $this->input->post('hp');
			$data['jenis_kelamin'] = $this->input->post('jenis_kelamin');
			$data['tempat_lahir'] = $this->input->post('tempat_lahir');
			$data['tanggal_lahir'] = $this->input->post('tanggal_lahir');
			$data['alamat'] = $this->input->post('alamat');
			
			$act = $this->UserModel->updateProfil($data);

			if ($act) {
				$response = array(
					'type' => 'success',
					'message' => 'Data Profil Berhasil Diubah anda akan dialihkan ke halaman login'
				);
			}else{
				$response = array(
					'type' => 'danger',
					'message' => 'Data Profil Gagal Diubah anda akan dialihkan ke halaman login'
				);
			}

			echo json_encode($response);
		}
	
	}
	
	/* End of file Profil.php */
	/* Location: ./application/controllers/Profil.php */
?>