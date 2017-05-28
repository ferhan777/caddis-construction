<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
 /**
 * 
 */
 class Users extends CI_Controller
 {
 	/*if there is no further users in this site
 	  we can move these files to the admin controller
 	 */
 	function __construct()
 	{
 		parent::__construct();
 		$this->load->model('user_model');
 	}

 	function login(){
 	 $data['error']=0;
 	 
 	 $this->form_validation->set_rules('username','Username','trim|required|min_length[3]');
 	 $this->form_validation->set_rules('password','Password','trim|required');
     
     if($this->form_validation->run()==false){
      $this->load->view('templates/header');
 	  $this->load->view('templates/navbar');
 	  $this->load->view('login');
 	  $this->load->view('templates/footer');	
     }else{
 	 if($_POST){
 	  $username=$this->input->post('username');
 	  $password=$this->input->post('password');
 	  $user=$this->user_model->auth($username,$password);
 	  $id=$user['0']['id'];
 	  if(!$user){
 	  	$data['error']=true;//this was the last task
 	  	//echo "user not found";
 	  }else{
 	  
       $this->session->set_userdata('username',$username);
       $this->session->set_userdata('id',$id);
       //echo $test=$this->session->userdata('username');
 	   //redirect(base_url().'admin/');
 	  }	
 	 }else{	
 	 $this->load->view('templates/header');
 	 $this->load->view('templates/navbar');
 	 $this->load->view('login');
 	 $this->load->view('templates/footer');
 	 }
 	}
 	}//closing of the function 

 	function logout(){
 	 $this->session->sess_destroy();
 	 redirect(base_url().'home');	
 	}
 }//closing of the class
?>