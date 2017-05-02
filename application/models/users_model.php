<?php 
	/**
	* 
	*/
	class Users_model extends CI_Model
	{
		
		function __construct()
		{
			parent::__construct();
		}

		public function login($email,$pass)
		{
			$sql="SELECT * FROM users u INNER JOIN user_role ur ON u.id_user=ur.id_user INNER JOIN roles r ON r.id_role=ur.id_role WHERE u.user_mail=? AND u.password=?";
			$query=$this->db->query($sql,array($email, md5($pass)));
			$res=$query->result();
			if ($query->num_rows()!=1) {
				return false;
			}
			else{
				return $res;
			}	
		}

		public function register($email,$pass)
		{
			$sql="SELECT * FROM users WHERE user_mail=?";
			$query=$this->db->query($sql,array($email));
			if ($query->num_rows()!=0) {
				return "exists";
			}
			else{
				$token = md5(uniqid(rand(),true));
				$sql="INSERT INTO users VALUES(null,?,?,?,'','','')";
				$query=$this->db->query($sql,array($email, md5($pass), $token));
				if ($this->db->affected_rows()!=0) {
					$sql="SELECT * FROM users WHERE id_user = ( SELECT MAX(id_user) FROM users)";
					$query=$this->db->query($sql);
					
					if ($query->num_rows()!=1) {
						return false;
					}
					else{
						foreach ($query->result_array() as $row) {
							$iduserrole=$row['id_user'];
						}
						$sql="INSERT INTO user_role VALUES(null, ? ,'2')";
						$query=$this->db->query($sql,array($iduserrole));
						if($this->db->affected_rows()==0){
							return false;
						}
						else{
							return true;
						}
					}
				}
				else{
					return false;
				}
			}	
		}

		public function requestReset($email)
		{
			$sql="SELECT * FROM users WHERE user_mail=?";
			$query=$this->db->query($sql,array($email));
			$res=$query->result();
			if ($query->num_rows()!=1) {
				return false;
			}
			else{
				return $res;
			}
		}

		public function userForReset($uid,$token)
		{
			$sql="SELECT * FROM users WHERE id_user=? AND token=?";
			$query=$this->db->query($sql,array($uid,$token));
			$res=$query->result();
			if ($query->num_rows()!=1) {
				return false;
			}
			else{
				return $res;
				//return $res;
			}
		}

		public function passwordReset($uid,$token,$pass)
		{
			$newtoken = md5(uniqid(rand(),true));
			$sql="UPDATE users SET password=?, token=? WHERE id_user=? AND token=?";
			$query=$this->db->query($sql,array(md5($pass),$newtoken,$uid,$token));
			if ($this->db->affected_rows()!=1) {
				return false;
			}
			else{
				return true;
			}
		}

		public function updateProfile($mail,$name,$lname,$img_url,$uid)
		{
			$sql="SELECT * FROM users where user_mail=? AND id_user<>?";
			$query=$this->db->query($sql,array($mail,$uid));
			$res=$query->result();
			if($query->num_rows()!=0){
				return "exists";
			}
			else{
				$sql="UPDATE users SET user_mail=?, firstname=?, lastname=?, user_image=? WHERE id_user=?";
				
				$query=$this->db->query($sql,array($mail,$name,$lname,$img_url,$uid));
				if ($this->db->affected_rows()!=1) {
					return false;
				}
				else{
					return true;
				}
			}
		}

		public function requestUserInfo($uid)
		{
			$sql="SELECT * FROM users WHERE id_user=?";
			$query=$this->db->query($sql,array($uid));
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