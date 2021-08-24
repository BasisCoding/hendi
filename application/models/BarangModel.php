<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class BarangModel extends CI_Model {
	
		var $column_order = array(null, 'nama_barang','harga_barang', 'kode_barang'); 
	    var $column_search = array('nama_barang','harga_barang', 'kode_barang'); //field yang diizin untuk pencarian 
	    var $order = array('kode_barang' => 'asc'); // default order 
	
	// Datatable
		private function _get_datatables_query()
		{
			$this->db->select('*');
			$this->db->from('barang');
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
		   
	        $query = $this->db->get();
	        return $query->result();
		}

		function count_filtered($where=NULL)
	    {
	        $this->_get_datatables_query();
	        $query = $this->db->get();
	        return $query->num_rows();
	    }
	 
	    function count_all($where=NULL)
	    {
	        $this->db->from('barang');
	        return $this->db->count_all_results();
	    }
	// Datatable

	    function addBarang($data)
	    {
	    	return $this->db->insert('barang', $data);
	    }

	    function updateBarang($id, $data)
	    {
	    	return $this->db->update('barang', $data, array('id' => $id));
	    }

	    function deleteBarang($id)
	    {
	    	return $this->db->delete('barang', array('id' => $id));
	    }
	
	}
	
	/* End of file BarangModel.php */
	/* Location: ./application/models/BarangModel.php */
?>