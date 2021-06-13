<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Pembayaran extends CI_Controller {
	
		public function index()
		{
			$def['title'] = 'SISRES | Data Pembayaran';
			$def['breadcrumb'] = 'Data Pembayaran';

			$this->load->view('partials/head', $def);
			$this->load->view('partials/navbar');
			$this->load->view('partials/breadcrumb', $def);
			$this->load->view('admin/datapembayaran');
			$this->load->view('partials/footer');
			$this->load->view('admin/plugins/datapembayaran');		
		}
	
	}
	
	/* End of file Pembayaran.php */
	/* Location: ./application/controllers/admin/Pembayaran.php */
?>