<?php 
/**
* 
*/
class Aboutme_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function getAboutMe()
	{
		$sql="SELECT * FROM aboutme";
		$query=$this->db->query($sql);
		$res=$query->result();
		if ($query->num_rows()!=1) {
			return false;
		}
		else{
			return $res;
		}
	}
}
?>