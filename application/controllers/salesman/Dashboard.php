<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Dashboard extends CI_Controller {

		public function __construct()
		{
			parent::__construct();
			if ($this->session->userdata('logged') == false || $this->session->userdata('level') != 4) {
				redirect('Auth','refresh');
			}
		}
	
		public function index()
		{
			$def['title'] = SHORT_SITE_URL.' | Dashboard';
			$def['breadcrumb'] = '';

			$this->load->view('partials/head', $def);
			$this->load->view('partials/navbar');
			$this->load->view('partials/breadcrumb', $def);
			$this->load->view('salesman/dashboard');
			$this->load->view('partials/footer');
			$this->load->view('salesman/plugins/dashboard');
		}
	
	}
	
	/* End of file Dashboard.php */
	/* Location: ./application/controllers/admin/Dashboard.php */
?>