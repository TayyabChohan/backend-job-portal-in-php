<?php
class Call_m extends CI_Model
{


    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    /********************************
     *  start Screen services 
     *********************************/
   
   

    public function get_days_data(){
        $slot_id=$this->input->post('slot_id');
        $get_data = $this->db->query("SELECT id, title, time_ FROM selected_days WHERE slot= '$slot_id'")->result_array();

         if($get_data){
           return  array( 'status'=>true, 'result'=>'data Fond');
         }
         else{
           return  array( 'status'=>false, 'result'=>'data Fond');
         }

    }

}
