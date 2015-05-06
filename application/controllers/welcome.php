<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

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
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_register');
		$this->load->model('m_booking');
	}

	public function index()
	{
		$this->load->view('welcome_message');
	}

	function login()
	{
		$username = $this->input->post('username');
        $password = $this->input->post('password');
       // $userrole = $this->input->userdata('role');

        $success = $this->m_register->login($username, $password);

        if($success == 1)
        {
        	$data["pageHeader"] = ' Header';
			$data["breadcrumb"] = ' Breadcrum';
			$data["breadactive"] = ' Breadactive';

			$data['output'] = $this->load->view('v_menu', $data, true);
			$this->load->view('v_main.php', $data);
        	
        }
        else if($success == 2)
        {
        	$data["pageHeader"] = ' Header';
			$data["breadcrumb"] = ' Breadcrum';
			$data["breadactive"] = ' Breadactive';

			$data['output'] = $this->load->view('v_menu', $data, true);
			$this->load->view('v_main.php', $data);

        }
        else
        {
        	// $this->load->view('welcome/index.php');
        	$this->load->view('welcome_message');
        }	


	}

	public function booking()
	{

		//$data['ListOfPackage'] = $this->m_booking->description();
		$data["pageHeader"] = ' Header';
		$data["breadcrumb"] = ' Breadcrum';
		$data["breadactive"] = ' Breadactive';

        $data['booking'] = $this->m_booking->description();
        $booking = $data['booking'];

        //print_r($booking);

        $data['output'] = $this->load->view('v_booking', $data, true);
		$this->load->view('v_main.php',$data);
	}

	public function viewBooking()
	{
		$data["pageHeader"] = ' Booking';
		$data["breadcrumb"] = ' Breadcrum';
		$data["breadactive"] = ' Breadactive';

		$loginid = $this->session->userdata("login_id");
		//$userrole = $this->session->userdata("role");
		$data['customer'] = $this->m_booking->view($loginid);
		$data['selectpackage'] = $this->input->post('selectpackage');
		$data['date'] = $this->input->post('startdate');
		$data['enddate'] = $this->input->post('enddate');

		$data['output'] = $this->load->view('v_view_booking', $data, true);
		$this->load->view('v_main.php',$data);
	}

	public function insertBookingReq()
	{
		print_r($_POST);
	}

	public function schedule()
	{
		$data["pageHeader"] = ' Package';
		$data["breadcrumb"] = ' Breadcrumb';
		$data["breadactive"] = ' Breadactive';

		$data['package'] = $this->m_booking->description();
        $package = $data['package'];

		$data['output'] = $this->load->view('v_package', $data, true);
		$this->load->view('v_main.php', $data);

	}

	public function addpackage()
	{
		$data["pageHeader"] = ' Add Package';
		$data["breadcrumb"] = ' Breadcrumb';
		$data["breadactive"] = ' Breadactive';

		$data['output'] = $this->load->view('v_addpackage', $data, true);
		$this->load->view('v_main.php', $data);
	}

	public function profile()
	{
		$this->load->view('v_profile');


	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */