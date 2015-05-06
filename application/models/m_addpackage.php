<?php

class M_addpackage extends CI_Model{

	public function add_package($data)
	{
		$query = $this->db->insert('package',$data);
		return $query;
	}

	public function getPackage($packageID)
	{
		$this->db->select('*');
		$this->db->where('package_id', $packageID);
		$query = $this->db->get('package');

		return $query->result();
	}

	public function list_package()
	{
		$this->db->select('*');
		$this->db->from('package');
		$query = $this->db->get();

		return $query->result();
	}

	public function update_package($packageID, $editDataPackage)
	{
		$this->db->where('package_id', $packageID);

		$status = $this->db->update('package', $editDataPackage);
		return $status;
	}

	public function delete_package($packageID)
	{
		$this->db->where('package_id', $packageID);
		$deleted = $this->db->delete('package');
		return $deleted;
	}
}

?>