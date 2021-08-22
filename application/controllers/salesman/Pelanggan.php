<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Pelanggan extends CI_Controller {

		public function __construct()
		{
			parent::__construct();
			$this->load->model('UPelangganModel');
		}
	
	// Function Pelanggan
	
		public function index()
		{
			$def['title'] = SHORT_SITE_URL.' | Data Pelanggan';
			$def['breadcrumb'] = 'Data Pelanggan';

			$this->load->view('partials/head', $def);
			$this->load->view('partials/navbar');
			$this->load->view('partials/breadcrumb', $def);
			$this->load->view('salesman/pelanggan');
			$this->load->view('partials/footer');
			$this->load->view('salesman/plugins/pelanggan');
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

	// End Function Pelanggan
	
	}
	
	/* End of file Pelanggan.php */
	/* Location: ./application/controllers/salesman/Pelanggan.php */
?>