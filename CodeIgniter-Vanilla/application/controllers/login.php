<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index() {
		
		$this->load->view('login');
		
	}
	
	public function result() {
		
		$this->load->library('session');
		$data = array('value' => $this->session->userdata('value'));
		
		$this->load->view('result', $data);
		
	}
	
	public function create() {
		
		$this->load->model('Credentials');
		
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		
		if (!empty($username) || !empty($password)) {
			$this->Credentials->insert_credentials();	
		}
		
		// $this->load->view('login');
		$this->load->view('login_plugin');
		
	}
	
	public function check() {
		
		$this->load->model('Credentials');	
		
		$result = $this->Credentials->check_credentials();
		
		// NOTE: At this point, you can include any authentication library
		// or class here.
		
		if (!empty($result)) {
			
			// Was the result set !empty? Let's initialise the session 
			// class and store the value retrieved for the corresponding
			// username and password.
		
			$this->load->library('session');
			$this->session->set_userdata('value', $result);
			
			// At this point, in this example, we have set the session data
			// the value that the user entered at the start of the example.
			// Ideally, this would be a session or something from your 
			// authentication class or library.
			
			echo "1"; 
			
			// echo "1" is the 'signal' that is sent back to the browser
			// that is recieved by Javascript, which will take action
		 	// to redirect the browser onwards.
		
		}
		
	}
	
	public function manual_login() {
		
		$this->load->model('Credentials');	
		
		$result = $this->Credentials->manual_check_credentials();
		
		// NOTE: At this point, you can include any authentication library
		// or class here.
		
		if (!empty($result)) {
			
			$this->load->library('session');
			$this->session->set_userdata('value', $result);
			
			header("Location: /index.php?/login/result");
			
		} else {
			
			header("Location: /index.php?/login/wrong");
			
		}
		
	}
	
	public function wrong() {
		
		$this->load->view('wrong');
		
	}
	
}

/* End of file login.php */
/* Location: ./application/controllers/login.php */