<?php 
	/**
	* 
	*/
	class Resume_model extends CI_Model
	{
		
		function __construct()
		{
			parent::__construct();
		}

		//----------------------------------------// GET DATA //----------------------------------------//

		public function getInfo($uid)
		{
			$sql="SELECT * FROM info WHERE id_user=? ORDER BY info_id ASC";
			$query=$this->db->query($sql,array($uid));
			$res=$query->result();
			if ($query->num_rows()==0) {
				return false;
			}
			else {
				return $res;
			}
		}

		public function getJobs($uid)
		{
			$sql="SELECT * FROM work WHERE id_user=? ORDER BY work_id ASC";
			$query=$this->db->query($sql,array($uid));
			$res=$query->result();
			if ($query->num_rows()==0) {
				return false;
			}
			else {
				return $res;
			}
		}

		public function getProjects($uid)
		{
			$sql="SELECT * FROM project WHERE id_user=? ORDER BY project_id ASC";
			$query=$this->db->query($sql,array($uid));
			$res=$query->result();
			if ($query->num_rows()==0) {
				return false;
			}
			else {
				return $res;
			}
		}

		public function getSkills($uid)
		{
			$sql="SELECT * FROM skill WHERE id_user=? ORDER BY skill_id ASC";
			$query=$this->db->query($sql,array($uid));
			$res=$query->result();
			if ($query->num_rows()==0) {
				return false;
			}
			else {
				return $res;
			}
		}

		//----------------------------------------// SET DATA //----------------------------------------//

		public function setInfo($uid,$title,$about,$phone,$mail,$website)
		{
			$sql="INSERT INTO info VALUES(null,?,?,?,?,?,?)";
			$query=$this->db->query($sql,array($title,$about,$phone,$mail,$website,$uid));
		}

		public function setJobs($uid,$name,$smonth,$syear,$emonth,$eyear)
		{
			$sql="INSERT INTO work VALUES(null,?,?,?,?,?,?)";
			$query=$this->db->query($sql,array($name,$smonth,$syear,$emonth,$eyear,$uid));
		}

		public function setProjects($uid,$name,$smonth,$syear,$emonth,$eyear)
		{
			$sql="INSERT INTO project VALUES(null,?,?,?,?,?,?)";
			$query=$this->db->query($sql,array($name,$smonth,$syear,$emonth,$eyear,$uid));
		}

		public function setSkills($uid,$skill)
		{
			$sql="INSERT INTO skill VALUES(null,?,?)";
			$query=$this->db->query($sql,array($skill,$uid));
		}	

		//----------------------------------------// DELETE DATA //----------------------------------------//

		public function deleteInfo($uid)
		{
			$sql="DELETE FROM info WHERE id_user=?";
			$this->db->query($sql,array($uid));
		}

		public function deleteJobs($uid)
		{
			$sql="DELETE FROM work WHERE id_user=?";
			$this->db->query($sql,array($uid));
		}

		public function deleteProjects($uid)
		{
			$sql="DELETE FROM project WHERE id_user=?";
			$this->db->query($sql,array($uid));
		}

		public function deleteSkills($uid)
		{
			$sql="DELETE FROM skill WHERE id_user=?";
			$this->db->query($sql,array($uid));
		}		
	}
?>