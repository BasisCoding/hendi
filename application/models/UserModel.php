<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class UserModel extends CI_Model {
	
		function updateProfil($data)
		{
			$id = $this->session->userdata('id');
			$table = $this->session->userdata('link');
			return $this->db->update($table, $data, array('id' => $id));
		}
	
	}
	
	/* End of file UserModel.php */
	/* Location: ./application/models/UserModel.php */
?>