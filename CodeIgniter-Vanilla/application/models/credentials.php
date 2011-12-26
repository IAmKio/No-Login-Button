<?php

class Credentials extends CI_Model {

    function __construct() {

        parent::__construct();
		$this->load->database();

    }
    
    function insert_credentials() {
	
		$data = array(
		   'username' => $this->input->post('username'),
		   'password' => $this->input->post('password'),
		   'value' => $this->input->post('value')
		);

		$this->db->insert('credentials', $data);

    }

	function check_credentials() {
		
		$query = $this->db->get_where('credentials', array('username' => $this->input->post('u'), 'password' => $this->input->post('p')));
		
		if (!empty($query->row(0)->value)) {			
			return $query->row(0)->value;
		}
		
	}
	
	function manual_check_credentials() {
		
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		
		if (empty($username) || empty($password)) {
			
			return 0;
			
		} else {
		
			$query = $this->db->get_where('credentials', array('username' => $username, 'password' => $password));
		
			if (!empty($query->row(0)->value)) {			
				return $query->row(0)->value;
			} else {
				return 0;
			}
		
		}
		
	}

}