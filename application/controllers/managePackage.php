<?php if (!defined('BASEPATH')) exit('Nor direct script access allowed');

class managePackage extends CI_controller{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_addpackage', 'ma');
	}

	function addpackage()
	{

		$packageID['package'] =  $this->ma->list_package();
		$this->load->view('v_package', $packageID);
	}

	function viewUpdateData()
  	{
  		$package_id = $this->input->post('packageID');
    	$data =  $this->ma->list_package($packageID);

    echo json_encode($data);
 	}

	function updatePackage()
	{
		$editDataPackage = array(
			'packageName' =>$this->input->post('package_name'),
			'packageDescription' =>$this->input->post('description'),
			);

		$packageID = $this->input->post('package');
		$update=$this->ma->update_package($packageID, $editDataPackage);

		if($update == "1")
		{
			redirect('test/updatePackage');
		}
	}
	 function delPackage($packageID)
  	{
    $deletePckge  =  $this->ma->deletePackage($packageID);

    if($deletePckge == 1)
    {
      redirect('test/package');
    }
 	}
}