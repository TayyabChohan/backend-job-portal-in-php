<?php


 defined('BASEPATH') or exit('No direct script access allowed');

header("Access-Control-Allow-Origin: *");

class Call_c extends CI_Controller
{

	public function __construct()
	{
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
		header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
		parent::__construct();
		 $this->load->database();
		$this->load->model('cms_m/Call_m');
		header("Access-Control-Allow-Origin: *");

	}

	public function get_days_data()
	{
		
		$result = $this->Call_m->get_days_data();
		echo json_encode($result);
		return json_encode($result);
		
	}

	
}
