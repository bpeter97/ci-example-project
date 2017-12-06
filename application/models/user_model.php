<?php

class User_model extends CI_Model
{
    // public function get_users($user_id, $username)
    // {
	// 	$this->db->where([
	// 		'id' => $user_id,
	// 		'username' => $username
	// 		]);
	// 	// $this->db->where('id', $user_id);
	// 	$query = $this->db->get('users');   
    // 	return $query->result(); 
		
	// 	// $query = $this->db->query("SELECT * FROM users");
		
	// 	// return $query->num_fields();	// This will give me the number of columns
	// 	// return $query->num_rows();	// This will give me the number of records

	// 	// $query = $this->db->get('users');   
    // 	// return $query->result();       
	// }
	
	// public function create_users($data)
	// {
	// 	$this->db->insert('users', $data);
	// }

	// public function update_users($id, $data)
	// {
	// 	$this->db->where(['id' => $id]);
	// 	$this->db->update('users', $data);
	// }

	// public function delete_users($id)
	// {
	// 	$this->db->where(['id' => $id]);
	// 	$this->db->delete('users');
	// }

	public function login_user($username, $password)
	{
		$result = $this->db->get_where('users', array('username' => $username));
		
		if(password_verify($password, $result->row(2)->password))	{
			return $result->row(0)->id;
		} else {
			return false;
		}
	}

	public function create_user()
	{
		$encripted_pass = password_hash($this->input->post('password', TRUE), PASSWORD_BCRYPT, ['cost' => 12]);

		$data = array(
			'username'		=>	$this->input->post('username', TRUE),
            'password'		=>	$encripted_pass,
            'first_name'	=>	$this->input->post('first_name', TRUE),
            'last_name'		=>	$this->input->post('last_name', TRUE),
            'email'			=>	$this->input->post('email', TRUE)
		);

		return $this->db->insert('users', $data);
	}
}

?>