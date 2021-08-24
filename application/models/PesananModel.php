<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class PesananModel extends CI_Model {
	
		var $column_order = array(null, 'p.nama_lengkap','b.nama_barang', 'ps.kode_pesanan', 'ps.status_pesanan', 's.nama_lengkap'); 
	    var $column_search = array('p.nama_lengkap','b.nama_barang', 'ps.kode_pesanan', 'ps.status_pesanan', 's.nama_lengkap'); //field yang diizin untuk pencarian 
	    var $order = array('ps.kode_pesanan' => 'desc'); // default order 
	
	// Datatable
		private function _get_datatables_query()
		{
			$this->db->select('ps.*, p.nama_lengkap as nama_pelanggan, b.nama_barang, b.kode_barang, s.nama_lengkap as nama_salesman');
			$this->db->from('pesanan as ps');
			$this->db->join('salesman as s', 's.id = ps.id_salesman', 'left');
			$this->db->join('pelanggan as p', 'p.id = ps.id_pelanggan', 'left');
			$this->db->join('barang as b', 'b.id = ps.id_barang', 'left');
	        $i = 0;
	     	
	        foreach ($this->column_search as $item) // looping awal
	        {
	            if($_POST['search']['value']) // jika datatable mengirimkan pencarian dengan metode POST
	            {
	                 
	                if($i===0) // looping awal
	                {
	                    $this->db->group_start();
	                    $this->db->like($item, $_POST['search']['value']); 
	                }
	                else
	                {
	                    $this->db->or_like($item, $_POST['search']['value']);
	                }
	 
	                if(count($this->column_search) - 1 == $i) 
	                    $this->db->group_end(); 
	            }
	            $i++;
	        }
	         
	        if(isset($_POST['order'])) { // here order processing
	            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
	        }  else if(isset($this->order)) {
	            $order = $this->order;
	            $this->db->order_by(key($order), $order[key($order)]);
	        }
		}

		function get_datatables($where=NULL)
		{
			$this->_get_datatables_query();
	        if($_POST['length'] != -1)
	        $this->db->limit($_POST['length'], $_POST['start']);
		   
		    if ($where != NULL) {
		    	$this->db->where($where);
		    }
	    	
	        $query = $this->db->get();
	        return $query->result();
		}

		function count_filtered($where=NULL)
	    {
	        $this->_get_datatables_query();
	    	if ($where != NULL) {
		    	$this->db->where($where);
		    }
	        $query = $this->db->get();
	        return $query->num_rows();
	    }
	 
	    function count_all($where=NULL)
	    {
	        $this->db->from('pesanan');
	    	if ($where != NULL) {
		    	$this->db->where($where);
		    }
	        return $this->db->count_all_results();
	    }
	// Datatable

	    public function getPesananById($id)
	    {
	    	$this->db->select('ps.*, p.nama_lengkap as nama_pelanggan,p.alamat, p.hp, b.nama_barang, b.kode_barang, s.nama_lengkap as nama_salesman');
			$this->db->from('pesanan as ps');
			$this->db->join('salesman as s', 's.id = ps.id_salesman', 'left');
			$this->db->join('pelanggan as p', 'p.id = ps.id_pelanggan', 'left');
			$this->db->join('barang as b', 'b.id = ps.id_barang', 'left');
			$this->db->where('ps.id', $id);
			return $this->db->get();
	    }

	    function addPesanan($data)
	    {
	    	return $this->db->insert('pesanan', $data);
	    }

	    function updatePesanan($id, $data)
	    {
	    	return $this->db->update('pesanan', $data, array('id' => $id));
	    }

	    function deletePesanan($id)
	    {
	    	return $this->db->delete('pesanan', array('id' => $id));
	    }

	
	}
	
	/* End of file gudangModel.php */
	/* Location: ./application/models/gudangModel.php */
?>