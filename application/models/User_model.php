<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 /**
 * 
 */
 class User_model extends CI_Model
 {
 	
 	// function __construct(argument)
 	// {
 	// 	# code...
 	// }

 	function auth($username,$password){
 	 $this->db->select('*')->from('users')->where(['username'=>$username,'password'=>$password]);
 	 $query = $this->db->get();
 	 return $query->result_array();	
 	}
 }
?>