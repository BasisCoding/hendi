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
			$this->load->view('salesman/pesanan');
			$this->load->view('partials/footer');
			$this->load->view('salesman/plugins/pesanan');
		}

		public function getKodePesanan()
		{
			$q = $this->db->query("SELECT MAX(RIGHT(kode_pesanan,3)) AS kd_max FROM pesanan WHERE DATE(created_at)=CURDATE()");
	        $kd = "";
	        if($q->num_rows()>0){
	            foreach($q->result() as $k){
	                $tmp = ((int)$k->kd_max)+1;
	                $kd = sprintf("%04s", $tmp);
	            }
	        }else{
	            $kd = "0001";
	        }
	        date_default_timezone_set('Asia/Jakarta');
	        $kode = 'INV'.date('dmy').$kd; // INV0202200001
	        echo json_encode($kode);
		}

		public function selectPelanggan()
		{
			$pelanggan = $this->db->get_where('pelanggan', array('status' => 1))->result();
			echo json_encode($pelanggan);
		}

		public function selectBarang()
		{
			$barang = $this->db->get('barang')->result();
			echo json_encode($barang);
		}

		public function getPesananById()
		{
			$id = $this->input->post('id');
			$get = $this->db->get_where('pesanan',array('id' => $id))->row();

			echo json_encode($get);
		}
		
		public function get_pesanan()
		{
			$where['id_salesman'] = $this->session->userdata('id');
			$list = $this->PesananModel->get_datatables($where);

			$data = array();
			$no = $_POST['start'];

			foreach ($list as $ls) {

				if ($ls->status_pesanan == 'Proses') {
					$button = '<div class="btn-group">
								<button class="btn btn-default btn-sm edit-data" data-id="'.$ls->id.'"><span class="fas fa-users-cog"></span></button>
								<button data-id="'.$ls->id.'" data-kode="'.$ls->kode_pesanan.'" class="btn btn-danger delete-data btn-sm"><span class="fas fa-times"></span></button>
							</div>';
					$status = '<span class="badge badge-dot mr-4">
	                            <i class="bg-danger"></i>
	                            <span class="status">Proses</span>
	                          </span>';
				}if ($ls->status_pesanan == 'Siap Dikirim') {
					$button = '';
					$status = '<span class="badge badge-dot mr-4">
	                            <i class="bg-warning"></i>
	                            <span class="status">Siap Dikirim</span>
	                          </span>';
				}if ($ls->status_pesanan == 'Dikirim') {
					$button = '';
					$status = '<span class="badge badge-dot mr-4">
	                            <i class="bg-success"></i>
	                            <span class="status">Dikirim</span>
	                          </span>';
				}

				$no++;
				$row = array();
				$row[] = $no;
				
				$row[] = $ls->kode_pesanan;
				$row[] = $ls->nama_pelanggan;
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
	            "recordsTotal" => $this->PesananModel->count_all($where),
	            "recordsFiltered" => $this->PesananModel->count_filtered($where),
	            "data" => $data
			);

			echo json_encode($output);
		}

		public function addPesanan()
		{
			$data['kode_pesanan'] = $this->input->post('kode_pesanan');
			$data['id_pelanggan'] = $this->input->post('id_pelanggan');
			$data['id_barang'] = $this->input->post('id_barang');
			$data['harga_barang'] = $this->input->post('harga_barang');
			$data['jumlah_barang'] = $this->input->post('jumlah_barang');
			$data['id_salesman'] = $this->session->userdata('id');
			$data['status_pesanan'] = 'Proses';

			$act = $this->PesananModel->addPesanan($data);

			if ($act) {
				$response = array(
					'type' => 'success',
					'message' => 'Data Pesanan berhasil dikirim'
				);
			}else{
				$response = array(
					'type' => 'danger',
					'message' => 'Data Pesanan gagal dikirim'
				);
			}

			echo json_encode($response);
		}

		public function updatePesanan()
		{
			$id = $this->input->post('id');

			$data['kode_pesanan'] = $this->input->post('kode_pesanan');
			$data['id_pelanggan'] = $this->input->post('id_pelanggan');
			$data['id_barang'] = $this->input->post('id_barang');
			$data['harga_barang'] = $this->input->post('harga_barang');
			$data['jumlah_barang'] = $this->input->post('jumlah_barang');
			
			$act = $this->PesananModel->updatePesanan($id, $data);

			if ($act) {
				$response = array(
					'type' => 'success',
					'message' => 'Data Pesanan Berhasil Diubah'
				);
			}else{
				$response = array(
					'type' => 'danger',
					'message' => 'Data Pesanan Gagal Diubah'
				);
			}

			echo json_encode($response);
		}

		public function deletePesanan()
		{
			$id = $this->input->post('id');

			$act = $this->PesananModel->deletePesanan($id);

			if ($act) {
				$response = array(
					'type' => 'success',
					'message' => 'Data Pelanggan Berhasil dihapus'
				);
			}else{
				$response = array(
					'type' => 'danger',
					'message' => 'Data Pelanggan Gagal dihapus'
				);
			}

			echo json_encode($response);
		}
	}
	
	/* End of file Pesanan.php */
	/* Location: ./application/controllers/salesman/Pesanan.php */
?>