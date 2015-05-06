<?php

class M_booking extends CI_Model
 {
 	function description()
 	{

 		$this->db->select('*');
 		$this->db->from('package');
    $query = $this->db->get();

    if($query->num_rows() > 0)
    {
        return $query->result();
    }
 	}

 	function view($loginID)
	{
		$this->db->select('customer.cu_id,customer.cu_fullname, customer.cu_address, customer.cu_email, customer.cu_tel_no');
		$this->db->from('customer');
		$this->db->where('login_id',$loginID);

	   
	    $query = $this->db->get();

	    return $query->result();
	}

	function submitbooking()
	{
		$this->db->insert('bookid, customer_id, package_id, date_start, date_end');
    	$query = $this->db->get('booking');
    	$submitbooking = $this->db->insert('booking', $data2);
    	return $query->result_array();

    	$data2 = array(
                              'book_id' => $this->input->post('book_id'),
                              'customer_id' => $this->input->post('cu_id'),
                              'package_id' => $this->input->post('selectpackage'),
                              'date_start' => $this->input->post('startdate'),
                              'date_end' => $this->input->post('enddate')
                              );

                      $submitbooking=$this->db->insert('booking', $data2);
                        
                          if($register_detail == 1)
                              {
                                  redirect('welcome/login');
	}

 }
}
?>

