<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ApplAddon extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->database();
		$this->load->helper('url');
		$this->load->model('grocery_crud_model');
		$this->load->model('Model_menuchger', 'menuchger');
		$this->load->library('grocery_CRUD');
		$this->load->library(array('ion_auth', 'form_validation'));

		if (!$this->ion_auth->logged_in())
		{
			// redirect them to the login page
			redirect('auth/login', 'refresh');
		}
	}

	
	public function index()
	{
		// $this->_guis_output((object)array('output' => '' , 'js_files' => array() , 'css_files' => array()));
		try{
			$crud = new grocery_CRUD();

			$crud->set_theme('datatables');
			$crud->set_table('appladdon');
			
			// $crud->set_relation('aircode','airlines','airlinescode');
			$crud->set_subject('ApplAddon');

			// $crud->required_fields('deletef');
			// $crud->columns('ipaddress','counter','ipdisplay', 'status', 'mrl');

			$crud->unset_print();
			$crud->unset_export();
			$output = $crud->render();
			
			$menu = $this->menuchger->tampil_data();
			$this->load->vars( array( 'menu' => $menu) );  
			$heading="List ApplAddon Data";
			$this->load->vars( array( 'heading' => $heading) );  

			$this->load->view('template2.php',(array)$output);

			// $this->_guis_output($output);

		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
		
	}

	
}	

	