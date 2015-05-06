<?php

class customer extends CI_controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->model('m_register');
		$this->load->database();
	}

	public function index()
	{

	}

	public function register()
	{
		$data['customer'] = $this->m_register->get_all();
	}

	// public function register_customer()
	// {
	// 	$data1 = array(

	// 		'username' => $this->input->post('loginname'),
	// 		'password' => $this->input->post('password'),
	// 		//'role'     => $this->input->post('')
	// 		);
	// 	$register = $this->db->insert('login', $data1);
	// 	$loginid  = $this->db->insert_id();

	// 	if($this->input->post('role') == 1)
	// 	{
	// 		$data1 = array(
	// 			'admin_email' => $this->input->post('txtemail'),
	// 			'role'        => $this->input->post('role'),
	// 			'login_id'    => $loginid
	// 			);
	// 		$register_detail = $this->db->insert('admin', $data1);

	// 		if($register_detail == 1)
	// 		{
	// 			redirect('#');
	// 		}
	// 		else if($this->input->post('role') == 2)
	// 		{
	// 			if($register == 1)
	// 			{
	// 				$data2 = array(
	// 					'cu_fullname' => $this->input->post('txtfullname'),
	// 					'cu_email'    => $this->input->post('txtemail'),
	// 					'cu_address'  => $this->input->post('txtaddress'),
	// 					'cu_tel_no'   => $this->input->post('txttelno'),
	// 					'login_id'    => $loginid
	// 					);

	// 				$register_detail = $this->db->insert('customer', $data2);

	// 				if($register_detail == 1)
	// 				{
	// 					redirect('#');
	// 				}
	// 			}
	// 		}
	// 	}
	// }

	public function login()
	{
		$username = $this->input->post('username');
        $password = $this->input->post('password');
       // $userrole = $this->input->userdata('role');

        $success = $this->m_register->login($username, $password, $userrole);

        if($success == 1)
        {
        	redirect('welcome/login');
        }
        else if($success == 2)
        {
        	redirect('welcome/login');
        }
        else
        {
        	$this->load->view('welcome/index.php');
        }

	}

	public function updateuser()
	{
		$loginid  = $this->session->userdata('login_id');
		$userrole = $this->session->userdata('role');

		$dataLogin = array(
			'username'  => $this->input->post('txtusername'),
			'password'  =. $this->input->post('password')
			);

		if($userrole == 2)
		{
			$data = array(
				'cu_fullname'  => $this->input->post('txtfullname'),
				'cu_email'     => $this->input->post('txtemail'),
				'cu_address'   => $this->input->post('txtaddress'),
				'cu_tel_no'    => $this->input->post('txttelno')
				);
		}

		$success = $this->m_register->update_profile($loginid, $data, $dataLogin);

		if($success == 1)
		{
			redirect('#');
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('login_id');
		$this->session->sess_destroy();
		redirect('welcome', 'refresh');
	}
}

?>