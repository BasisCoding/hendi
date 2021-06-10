<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Dashboard extends CI_Controller {
	
		public function index()
		{
			$def['title'] = 'SISRES | Dashboard';
			$def['breadcrumb'] = '';

			$this->load->view('partials/head', $def);
			$this->load->view('partials/navbar');
			$this->load->view('partials/breadcrumb', $def);
			$this->load->view('admin/dashboard');
			$this->load->view('partials/footer');
			$this->load->view('admin/plugins/dashboard');
		}
	
	}
	
	/* End of file Dashboard.php */
	/* Location: ./application/controllers/admin/Dashboard.php */
?>