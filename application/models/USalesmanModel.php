<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class USalesmanModel extends CI_Model {
	
		var $column_order = array(null, 'a.username','a.nama_lengkap','a.email', 'a.hp', 'a.jenis_kelamin', 'a.alamat', 'a.status'); 
	    var $column_search = array('a.username','a.nama_lengkap','a.email', 'a.hp', 'a.jenis_kelamin', 'a.alamat', 'a.status'); //field yang diizin untuk pencarian 
	    var $order = array('a.nama_lengkap' => 'asc'); // default order 
	
	// Datatable
		private function _get_datatables_query()
		{
			$this->db->select('a.*');
			$this->db->from('salesman as a');
			$this->db->where('status', 1);
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

		function get_datatables()
		{
			$this->_get_datatables_query();
	        if($_POST['length'] != -1)
	        $this->db->limit($_POST['length'], $_POST['start']);
	    	
	        $query = $this->db->get();
	        return $query->result();
		}

		function count_filtered()
	    {
	        $this->_get_datatables_query();
	        $query = $this->db->get();
	        return $query->num_rows();
	    }
	 
	    function count_all()
	    {
	        $this->db->from('salesman');
	        return $this->db->count_all_results();
	    }
	// Datatable

	    function getSalesmanByUsername($username)
	    {
	    	$this->db->select('*');
	    	$this->db->where('username', $username);
	    	return $this->db->get('salesman');	
	    }

	    function getSalesmanById($id)
	    {
	    	return $this->db->get_where('salesman', array('id' => $id));
	    }

	    function addSalesman($data)
	    {
	    	return $this->db->insert('salesman', $data);
	    }

	    function updateSalesman($id, $data)
	    {
	    	return $this->db->update('salesman', $data, array('id' => $id));
	    }
	
	}
	
	/* End of file PelangganModel.php */
	/* Location: ./application/models/PelangganModel.php */
?>