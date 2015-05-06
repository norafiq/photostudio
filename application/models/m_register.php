<?php
/**********************************************************************************************************************
*File Name                       : m_register.php
*Description                     : 
*Author                          :
*Date                            :
*Version                         :
*Modification Log                :
*Function List                   :
***********************************************************************************************************************/

class M_register extends CI_Model
{

/**********************************************************************************************************************
*Description                     : insert data into customer table
*Author                          :
*Date                            :
*Input Parameter                 :
*Modification Log                :
***********************************************************************************************************************/

    public function register()
    {
    	$this->db->select('cu_fullname, cu_username, cu_password, cu_email, cu_address,
    					   cu_tel_no');
    	$query = $this->db->get('customer');

    	return $query->result_array();
    }

/**********************************************************************************************************************
*Description                     : get data from customer table
*Author                          :
*Date                            :
*Input Parameter                 :
*Modification Log                :
***********************************************************************************************************************/

    public function get_customer($cu_id)
    {
    	$this->db->select('cu_username, cu_password, cu_address, cu_tel_no');
        $this->db->where('cu_id',$cu_id);
        $query = $this->db->get('customer');

        return $query->row_array();
    }

/**********************************************************************************************************************
*Description                     : insert data into table
*Author                          :
*Date                            :
*Input Parameter                 :
*Modification Log                :
***********************************************************************************************************************/

    public function register_customer($data)
    {
    	$query = $this->db->select('customer', $data);
    	return $query;
	}
	
	// function admin_register($data)
	// {
	// 	$query = $this->db->insert('admin', $data);
	// 	return $query;
	// }

/**********************************************************************************************************************
*Description                     : login
*Author                          :
*Date                            :
*Input Parameter                 :
*Modification Log                :
***********************************************************************************************************************/


	function login($username, $password)
	{

		$this->db->select('*');
		$this->db->from('login');
		$this->db->where('username', $username);
		$this->db->where('password', $password);

		/*$this->session->set_userdata(array(

			'username' => $username));
*/
		$query = $this -> db -> get();

		if($query -> num_rows() == 1)
		{
			$result = $query->row();

			$loginid = $result->login_id;
			$userrole = $result->role;

			$this->load->library("session");
			$this->session->set_userdata("login_id", $loginid);
			$this->session->set_userdata("role", $userrole);

			if($userrole == "1")
			{
				return 1;
			}
			else
			{
				return 2;
			}
		}
		else
		{
			return false;
		}
	}

/**********************************************************************************************************************
*Description                     : update profile
*Author                          :
*Date                            :
*Input Parameter                 :
*Modification Log                :
***********************************************************************************************************************/

	public function update_profile($loginid, $data, $dataLogin)
	{
	    $userrole = $this->session->userdata("role");

	    $this->db->where('login_id', $loginid);  //pass this register direct into update
	    $this->db->update("login", $dataLogin);


        if ($userrole ==1)
        {
        	//$this->db->update('admin', $data);
        }
        else
        {	
        	$this->db->where("login_id", $loginid);
        	$this->db->update('customer', $data); 
        }
        

        return 1;

	}

	public function insert_user($data)
 	{
 		$query = $this->db->insert('customer', $data);
 		return $query;
 	}

 	public function insert_user2($data)
 	{
 		$query = $this->db->insert('login', $data);
 		return $query;
 	}

 	public function selectAll($loginid)
 	{
 		$this->db->select("*");
 		$this->db->from("customer cu");
 		$this->db->join("login l","cu.login_id = l.login_id");
 		$this->db->where("cu.login_id", $loginid);
 		$query = $this->db->get();

 		if($query->num_rows() > 0)
 		{
 			return $query->result();
 		}
 		
 	}

 	public function update($loginid)
 	{
 		$this->db->select("cu.cu_id,cu.cu_fullname, l.username, l.password, cu.cu_email, cu.cu_address, cu.cu_tel_no");
 		$this->db->from('customer cu');
 		$this->db->join("login l","cu.login_id = l.login_id");
 		$this->db->where("cu.login_id", $loginid);
 		$query = $this->db->get();
 		return $query->result();

 	}


}
/**********************************************************************************************************************
*End of m_register.php
***********************************************************************************************************************/

?>