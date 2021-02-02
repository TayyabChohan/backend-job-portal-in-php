<?php
class Add_content_m extends CI_Model
{


    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    /********************************
     *  start Screen services 
     *********************************/
    public function addContent()
    
    {
        $addContent = $this->input->post('addContent');
        $location = $this->input->post('location');
        $publishedDate = $this->input->post('publishedDate');
        $LastDatetoApply = $this->input->post('LastDatetoApply');
        $JobDescription = $this->input->post('JobDescription');
        $newspaperName = $this->input->post('newspaperName');
        $selectObjcet = $this->input->post('selectObjcet');
        //  var_dump($selectObjcet);
        //  exit();

        $Set_data = $this->db->query("INSERT INTO add_content ( content,job_location, published_date, 
        last_date,newsPaper,Description,selectObject)
         values ('$addContent', '$location','$publishedDate',
            '$LastDatetoApply','$newspaperName','$JobDescription','$selectObjcet')"); 

         $tableData = $Set_data;
         $get_data = $this->db->query("SELECT cont_id FROM add_content
        where cont_id = (SELECT max(cont_id) from add_content)")->result_array();
        $tableData = $get_data[0]['cont_id'];

        // print_r($tableData); exit();
        $tableData = $this->db->query(" SELECT  cont_id ,  content,  job_location,  published_date ,  last_date, 
        newsPaper,  Description,  selectObject from add_content  where  cont_id = '$tableData' order by cont_id DESC ")->result_array();
        return array("status" => true, "tableData" => $tableData); 

    }
    public function signUp_()
    
    {
      
        $userName = $this->input->post('userName');
        $email = $this->input->post('email');
        // var_dump($email);exit;
        $psw = $this->input->post('psw');
        $ps_repeat = $this->input->post('ps_repeat');

        $get_data = $this->db->query("SELECT email FROM signup_ where email ='$email' ")->result_array();
        $tableData = $get_data[0]['email'];
        
         if(!$tableData){
            //  var_dump($get_data); exit;
           $Set_data = $this->db->query("INSERT INTO signup_ ( userName,email, password,confirm_password) values ('$userName', '$email','$psw','$ps_repeat')"); 
            return $Set_data;
       
         }
         else{
            return  array( 'result'=>'User Allready Registered');
         }       

    }
   
     public function login_(){
         $userName=$this->input->post('username');
         $password=$this->input->post('password');
         $get_data = $this->db->query("SELECT email,password FROM signup_ where email ='$userName' and password='$password'")->result_array();

          if($get_data){
            return  array( 'status'=>true, 'result'=>'Seccusfuly Login');
          }
          else{
            return  array( 'status'=>false, 'result'=>'login Not Seccusfuly');
          }

     }



    public function selectContent()
    {
    
        $select_data = $this->db->query("SELECT `cont_id`, `content` FROM add_content")->result_array();
        return array("status" => true, "tableData" => $select_data);
    }
    public function getAllContent()
    
    {
    
        $select_data = $this->db->query("SELECT * FROM add_content")->result_array();
        return array("status" => true, "tableData" => $select_data);
    }

    public function getContent()
    {
        $cont_id=$this->input->post('id');
        
        $select_data = $this->db->query("SELECT * from add_content where cont_id='$cont_id'")->result_array();
        return array("status" => true, "tableData" => $select_data);
    }
    public function delete_content()
    {
        $cont_id=$this->input->post('id');
        // var_dump($cont_id); exit();
        $select_data = $this->db->query("DELETE FROM add_content where cont_id='$cont_id'");
        return  $select_data;
    }

    public function getJobCategory()
    {
        $job_cat=$this->input->post('job_cat');
        // var_dump($job_cat);exit();
        if($job_cat=='alljobs'){
            $select_data = $this->db->query("SELECT * from add_content ")->result_array();
            return array("status" => true, "tableData" => $select_data ,'all'=>['jobs']); 
        }
        else{

                $select_data = $this->db->query("SELECT * from add_content where selectObject='$job_cat'")->result_array();
            return array("status" => true, "tableData" => $select_data);
        }
    }



    public function get_days_data(){
        $slot_id=$this->input->post('slot_id');
        $get_data = $this->db->query("SELECT id, title, time_ FROM selected_days WHERE slot= '$slot_id'")->result_array();
         return  array( 'status'=>true, 'result'=>$get_data);    

    }
    

    public function save_appointment()
    {
        $slot_id = $this->input->post('slot_id');
        $title = $this->input->post('title');
        $time = $this->input->post('time');
        $phone = $this->input->post('phone');
        $email = $this->input->post('email');
        $description = $this->input->post('description');
        $option_ = $this->input->post('option_');
        

        $Set_data = $this->db->query("INSERT INTO apoint(`slot_id`, `title`, `time`, `phone`, `email`, `description`, `option_`)
         VALUES ('$slot_id','$title','$time','$phone','$email','$description','$option_')"); 

         $tableData = $Set_data;
         $get_data = $this->db->query("SELECT app_id FROM apoint
        where app_id = (SELECT max(app_id) from apoint)")->result_array();
        $tableData = $get_data[0]['app_id'];

        $tableData = $this->db->query(" SELECT `slot_id`, `title`, `time`, `phone`, `email`, `description`, `option_` from apoint  where  app_id = '$tableData' order by app_id DESC ")->result_array();
        if($tableData){

            return array("status" => true, "tableData" => $tableData, 'messsge'=>'Appointment Scheduled'); 
        }
        else{
            return array("status" => false,'messsge'=>'Appointment Not Scheduled'); 

        }


}
}