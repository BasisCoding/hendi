<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Salesman extends CI_Controller {

		public function __construct()
		{
			parent::__construct();
			$this->load->model('USalesmanModel');
		}
	
	// Function Salesman
	
		public function index()
		{
			$def['title'] = SHORT_SITE_URL.' | Data Salesman';
			$def['breadcrumb'] = 'Data Salesman';

			$this->load->view('partials/head', $def);
			$this->load->view('partials/navbar');
			$this->load->view('partials/breadcrumb', $def);
			$this->load->view('gudang/salesman');
			$this->load->view('partials/footer');
			$this->load->view('gudang/plugins/salesman');
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
				
				$row[] = $ls->nama_lengkap;
				$row[] = $ls->email;
				$row[] = $ls->hp;
				$row[] = $ls->jenis_kelamin;
				$row[] = $ls->tempat_lahir.', '.$ls->tanggal_lahir;

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

	// End Function salesman
	
	}
	
	/* End of file salesman.php */
	/* Location: ./application/controllers/salesman/salesman.php */
?>