<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

	public function login($value)
	{
		$where = ['username' => $value['username'], 'password' => md5($value['password'])];
		$query = $this->db->get_where('user', $where);

		if ($query->num_rows()) {
			$user = $query->row();
			if($user->status){
				return ['status' => true, 'data' => $user];
			}else{
				return ['status' => false, 'message' => 'user is blocked !'];
			}
		}else{
			return ['status' => false, 'message' => 'user not found !'];
		}
	}	

}

/* End of file User_model.php */
/* Location: ./application/models/User_model.php */