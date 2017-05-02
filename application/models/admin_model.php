<?php 
	/**
	* 
	*/
	class Admin_model extends CI_Model
	{
		
		function __construct()
		{
			parent::__construct();
		}

		/* ABOUT ME QUERIES */

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

		public function updateAboutMe($name,$desc,$studid,$mail,$img_file)
		{
			$sql="UPDATE aboutme SET myname=?, mydesc=?, mystudid=?, myemail=?, myimg=?";
			$query=$this->db->query($sql,array($name,$desc,$studid,$mail,$img_file));
			if ($this->db->affected_rows()!=1) {
				return false;
			}
			else{
				return true;
			}
		}

		/* USER QUERIES */

		public function getUserNumber()
		{
			$sql="SELECT * FROM users";
			$query=$this->db->query($sql);
			$num=$query->num_rows();

			return $num;
		}

		public function getUsers($limit,$offset)
		{
			$sql = "SELECT * FROM users u INNER JOIN user_role ur ON u.id_user=ur.id_user INNER JOIN roles r ON r.id_role=ur.id_role ORDER BY u.id_user ASC LIMIT ? OFFSET ?";
			$query = $this->db->query($sql,array($limit,$offset));
			$res=$query->result();
			if ($query->num_rows()!=0) {
				return $res;
			}
			else{
				return false;
			}
		}

		public function deleteUsers($uid)
		{
			$sql="DELETE FROM users WHERE id_user=?";
			$query=$this->db->query($sql,array($uid));

			$sql="DELETE FROM user_role WHERE id_user=?";
			$query=$this->db->query($sql,array($uid));

			$sql="DELETE FROM skill WHERE id_user=?";
			$query=$this->db->query($sql,array($uid));

			$sql="DELETE FROM project WHERE id_user=?";
			$query=$this->db->query($sql,array($uid));

			$sql="DELETE FROM info WHERE id_user=?";
			$query=$this->db->query($sql,array($uid));

			$sql="DELETE FROM work WHERE id_user=?";
			$query=$this->db->query($sql,array($uid));
		}

		public function getResumeNumber()
		{
			$sql = "SELECT id_user FROM users WHERE id_user IN (SELECT id_user FROM info UNION SELECT id_user FROM project UNION SELECT id_user FROM work UNION SELECT id_user FROM skill)";
			$query=$this->db->query($sql);
			$num=$query->num_rows();

			return $num;
		}

		public function getUsersWithResumes($limit,$offset)
		{
			$sql = "SELECT * FROM users WHERE id_user IN (SELECT id_user FROM info UNION SELECT id_user FROM project UNION SELECT id_user FROM work UNION SELECT id_user FROM skill) ORDER BY id_user ASC LIMIT ? OFFSET ?";
			$query = $this->db->query($sql,array($limit,$offset));
			$res=$query->result();
			if ($query->num_rows()!=0) {
				return $res;
			}
			else{
				return false;
			}
		}

		public function deleteResumes($uid)
		{
			$sql="DELETE FROM skill WHERE id_user=?";
			$query=$this->db->query($sql,array($uid));

			$sql="DELETE FROM project WHERE id_user=?";
			$query=$this->db->query($sql,array($uid));

			$sql="DELETE FROM info WHERE id_user=?";
			$query=$this->db->query($sql,array($uid));

			$sql="DELETE FROM work WHERE id_user=?";
			$query=$this->db->query($sql,array($uid));
		}
	}
?>