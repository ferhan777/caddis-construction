<?php
 /**
 * 
 */
 class Test extends CI_Controller
 {
 	
 	function __construct()
 	{
 	  parent::__construct();

 	  $this->load->library('Image_CRUD');
 	}

 	public function t(){
 	 //echo "this is a test";
 	 $this->load->view('login');	
 	}

 	function example1()
    {
      $image_crud = new Image_CRUD();
 
	  $image_crud->set_table('example_1');
 
	  //If your table have by default the "id" field name as a primary key this line is not required
	  $image_crud->set_primary_key_field('id');
 
	  $image_crud->set_url_field('url');
	  $image_crud->set_image_path('assets/uploads');
 
	  $output = $image_crud->render();
 
	  $this->_example_output($output);
	  //$this->load->view('example.php',(array)$output);
	}

	function example4()
	{
		$image_crud = new image_CRUD();
	
		$image_crud->set_primary_key_field('id');
		$image_crud->set_url_field('url');
		$image_crud->set_title_field('title');
		$image_crud->set_table('images')
		->set_ordering_field('priority')
		->set_image_path('assets/uploads');
			
		$output = $image_crud->render();
	
		$this->_example_output($output);
	}

	function simple_photo_gallery()
	{
		$image_crud = new image_CRUD();
		
		$image_crud->unset_upload();
		$image_crud->unset_delete();
		
		$image_crud->set_primary_key_field('id');
		$image_crud->set_url_field('url');
		$image_crud->set_table('example_4')
		->set_image_path('assets/uploads');
		
		$output = $image_crud->render();
		
		$this->_example_output($output);		
	}

	function _example_output($output = null)
	{
		$this->load->view('example.php',(array)$output);	
	}
 }
?>