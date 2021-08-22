<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Pesanan extends CI_Controller {
		
		public function __construct()
		{
			parent::__construct();
			$this->load->model('PesananModel');
		}

		public function index()
		{
			$def['title'] = SHORT_SITE_URL.' | Data Pesanan';
			$def['breadcrumb'] = 'Data Pesanan';

			$this->load->view('partials/head', $def);
			$this->load->view('partials/navbar');
			$this->load->view('partials/breadcrumb', $def);
			$this->load->view('gudang/pesanan');
			$this->load->view('partials/footer');
			$this->load->view('gudang/plugins/pesanan');
		}

		public function get_pesanan()
		{
			// $where = NULL;
			$list = $this->PesananModel->get_datatables();

			$data = array();
			$no = $_POST['start'];

			foreach ($list as $ls) {

				if ($ls->status_pesanan == 'Proses') {
					$button = '<button data-id="'.$ls->id.'" data-kode="'.$ls->kode_pesanan.'" class="btn btn-warning siap-pesanan btn-sm"><span class="ni ni-bag-17"></span></button>';

					$status = '<span class="badge badge-dot mr-4">
	                            <i class="bg-danger"></i>
	                            <span class="status text-danger">Proses</span>
	                          </span>';
				}if ($ls->status_pesanan == 'Siap Dikirim') {
					$button = '';

					$status = '<span class="badge badge-dot mr-4">
	                            <i class="bg-warning"></i>
	                            <span class="status text-warning">Siap Dikirim</span>
	                          </span>';
				}if ($ls->status_pesanan == 'Dikirim') {
					$button = '';

					$status = '<span class="badge badge-dot mr-4">
	                            <i class="bg-success"></i>
	                            <span class="status text-success">Dikirim</span>
	                          </span>';
				}

				$no++;
				$row = array();
				$row[] = $no;
				
				$row[] = $ls->kode_pesanan;
				$row[] = $ls->nama_pelanggan;
				$row[] = $ls->nama_salesman;
				$row[] = $ls->kode_barang;
				$row[] = $ls->nama_barang;
				$row[] = $ls->harga_barang;
				$row[] = $ls->jumlah_barang;
				$row[] = $status;

				$row[] = $button;

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

		public function PesananSiap()
		{
			$id = $this->input->post('id');

			$data['status_pesanan'] = 'Siap Dikirim';
			$data['waktu_siap'] = date('Y-m-d H:i:s');

			$act = $this->PesananModel->updatePesanan($id, $data);

			if ($act) {
				$response = array(
					'type' => 'success',
					'message' => 'Data Pesanan Berhasil Disiapkan'
				);
			}else{
				$response = array(
					'type' => 'danger',
					'message' => 'Data Pesanan Gagal Disiapkan'
				);
			}

			echo json_encode($response);
		}

	}
	
	/* End of file Pesanan.php */
	/* Location: ./application/controllers/salesman/Pesanan.php */
?>