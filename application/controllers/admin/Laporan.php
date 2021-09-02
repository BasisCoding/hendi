<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Laporan extends CI_Controller {
	
		public function __construct()
		{
			parent::__construct();
			if ($this->session->userdata('logged') == false || $this->session->userdata('level') != 1) {
				redirect('Auth','refresh');
			}

			$this->load->model('PesananModel');
		}
	
		public function index()
		{
			$def['title'] = SHORT_SITE_URL.' | Laporan';
			$def['breadcrumb'] = '';

			$this->load->view('partials/head', $def);
			$this->load->view('partials/navbar');
			$this->load->view('partials/breadcrumb', $def);
			$this->load->view('admin/laporan');
			$this->load->view('partials/footer');
			$this->load->view('admin/plugins/laporan');
		}

		public function get_pesanan()
		{
			$list = $this->PesananModel->get_datatables();

			$data = array();
			$no = $_POST['start'];

			foreach ($list as $ls) {

				$no++;
				$row = array();
				$row[] = $no;
				
				$row[] = $ls->kode_pesanan;
				$row[] = $ls->nama_pelanggan;
				$row[] = $ls->kode_barang;
				$row[] = $ls->nama_barang;
				$row[] = $ls->harga_barang;
				$row[] = $ls->jumlah_barang;

				$data[] = $row;
			}

			$output = array(
				"draw" => $_POST['draw'],
	            "recordsTotal" => $this->PesananModel->count_all(),
	            "recordsFiltered" => $this->PesananModel->count_filtered(),
	            "data" => $data
			);

			echo json_encode($output);
		}
	
	}
	
	/* End of file Laporan.php */
	/* Location: ./application/controllers/Laporan.php */
?>