<?php class Management_model extends CI_Model {
	//public $query;

	public function __construct()
	{
			// Call the CI_Model constructor
			parent::__construct();
	}

	public function login($data) {
		$hashpass = $this->db->escape_str($data['password']);
		$hashpass = $this->getHash($hashpass);
		$condition = "uname = '" . $this->db->escape_str($data['username']) . "' AND upass = '" . $hashpass . "'";
		$this->db->select('*');
		$this->db->from('umanagements');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();

		if ($query->num_rows() == 1) {
			return true;
		} else {
			return false;
		}
	}

	// Read data from database to show data in admin page
	public function read_user_information($username) {

		$condition = "uname ='" . $this->db->escape_str($username) . "'";
		$this->db->select('*');
		$this->db->from('umanagements');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();

		if ($query->num_rows() == 1) {
			return $query->result();
		} else {
			return false;
		}
	}
	public function getHash($pass)
	{
		$salt = '@#$sd$#2123';
		return MD5(MD5($pass.$salt).$salt);
	}

}
?>