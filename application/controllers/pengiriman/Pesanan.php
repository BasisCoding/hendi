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
			$this->load->view('pengiriman/pesanan');
			$this->load->view('partials/footer');
			$this->load->view('pengiriman/plugins/pesanan');
		}

		public function getPesananById()
		{
			$id = $this->input->get('id');
			$get = $this->PesananModel->getPesananById($id)->row();

			echo json_encode($get);
		}

		public function get_pesanan()
		{
			$where = 'status_pesanan != "Proses"';
			$list = $this->PesananModel->get_datatables($where);
			// echo $this->db->last_query($list);
			$data = array();
			$no = $_POST['start'];

			foreach ($list as $ls) {

				if ($ls->status_pesanan == 'Proses') {
					$button = '';

					$status = '<span class="badge badge-dot mr-4">
	                            <i class="bg-danger"></i>
	                            <span class="status text-danger">Proses</span>
	                          </span>';
				}if ($ls->status_pesanan == 'Siap Dikirim') {
					$button = '<div class="btn-group">
									<button class="btn btn-warning btn-sm kirim-pesanan" data-id="'.$ls->id.'" data-kode="'.$ls->kode_pesanan.'"><span class="ni ni-delivery-fast"></span></button>
									<button data-id="'.$ls->id.'" data-kode="'.$ls->kode_pesanan.'" class="btn btn-success detail-pesanan btn-sm"><span class="ni ni-collection"></span></button>
								</div>';

					$status = '<span class="badge badge-dot mr-4">
	                            <i class="bg-warning"></i>
	                            <span class="status text-warning">Siap Dikirim</span>
	                          </span>';
				}if ($ls->status_pesanan == 'Dikirim') {
					$button = '<button data-id="'.$ls->id.'" data-kode="'.$ls->kode_pesanan.'" class="btn btn-success detail-pesanan btn-sm"><span class="ni ni-collection"></span></button>';

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
				$row[] = $status;

				$row[] = $button;

				$data[] = $row;
			}

			$output = array(
				"draw" => $_POST['draw'],
	            "recordsTotal" => $this->PesananModel->count_all($where),
	            "recordsFiltered" => $this->PesananModel->count_filtered($where),
	            "data" => $data
			);

			echo json_encode($output);
		}

		public function KirimPesanan()
		{
			$id = $this->input->post('id');

			$data['status_pesanan'] = 'Dikirim';
			$data['waktu_kirim'] = date('Y-m-d H:i:s');

			$act = $this->PesananModel->updatePesanan($id, $data);

			if ($act) {
				$response = array(
					'type' => 'success',
					'message' => 'Data Pesanan Berhasil Dikirim'
				);
			}else{
				$response = array(
					'type' => 'danger',
					'message' => 'Data Pesanan Gagal Dikirim'
				);
			}

			echo json_encode($response);
		}

	}
	
	/* End of file Pesanan.php */
	/* Location: ./application/controllers/salesman/Pesanan.php */
?>