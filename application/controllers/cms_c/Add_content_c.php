<?php


 defined('BASEPATH') or exit('No direct script access allowed');

header("Access-Control-Allow-Origin: *");

class Add_content_c extends CI_Controller
{

	public function __construct()
	{
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
		header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
		parent::__construct();
		 $this->load->database();
		$this->load->model('cms_m/Add_content_m');
		header("Access-Control-Allow-Origin: *");

	}

	public function addContent()
	{
		
		$result = $this->Add_content_m->addContent();
		echo json_encode($result);
		return json_encode($result);
		
	}
	public function selectContent()
	{
		
		$result = $this->Add_content_m->selectContent();
		echo json_encode($result);
		return json_encode($result);
		
	}
	public function getContent()
	{
		
		$result = $this->Add_content_m->getContent();
		echo json_encode($result);
		return json_encode($result);
		
	}
	public function getJobCategory()
	{
		
		$result = $this->Add_content_m->getJobCategory();
		echo json_encode($result);
		return json_encode($result);
		
	}
	public function GetAllContent()
	{
		
		$result = $this->Add_content_m->getAllContent();
		echo json_encode($result);
		return json_encode($result);
		
	}
	public function delete_content()
	{
		
		$result = $this->Add_content_m->delete_content();
		echo json_encode($result);
		return json_encode($result);
		
	}
	public function signUp_()
	{
		
		$result = $this->Add_content_m->signUp_();
		echo json_encode($result);
		return json_encode($result);
		
	}

	 public function login_(){
		 $result= $this->Add_content_m->login_();
		 echo json_encode($result);
		return json_encode($result);
	 }

	 public function get_days_data()
	{
		$result = $this->Add_content_m->get_days_data();
		echo json_encode($result);
		return json_encode($result);
		
	}
	 public function save_appointment()
	{
		$result = $this->Add_content_m->save_appointment();
		echo json_encode($result);
		return json_encode($result);
		
	}
	
}
