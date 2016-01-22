<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usermanagement extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('welcome_message');
	}
	public function login() {
		$this->load->view('login_form');
	}
	public function user_login_process() {

		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			if(isset($this->session->userdata['logged_in'])){
				header("location: ".base_url()."setsock.png");
			}else{
				$this->load->view('login_form');
			}
		} else {
			$data = array(
			'username' => $this->input->post('username', true),
			'password' => $this->input->post('password', true)
			);
			$this->load->model('Management_model');
			$result = $this->Management_model->login($data);
			if ($result == TRUE) 
			{
				$username = $this->input->post('username',true);
				$result = $this->Management_model->read_user_information($username);
				if ($result != false) 
				{
					$session_data = array(
						'loggeduser' => $result[0]->uname,
						'email' => $result[0]->email,
					);
					// Add user data in session
					$this->session->set_userdata('logged_in', $session_data);
					header("location: ".base_url()."setsock.png");
				}
			} else {
				$data = array(
					'error_message' => 'Invalid Username or Password'
				);
				$this->load->view('login_form', $data);
			}
		}
	}

	// Logout from admin page
	public function logout() {
		// Removing session data
		$sess_array = array(
			'loggeduser' => ''
		);
		$this->session->unset_userdata('logged_in', $sess_array);
		$data['message_display'] = 'Successfully Logout';
		$this->load->view('login_form', $data);
	}
	
}
