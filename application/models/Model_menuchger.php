<?php
class Model_menuchger extends CI_Model{
    

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->db = $this->load->database("ion_auth", true);
    }
    
    
    function tampil_data(){
        $query = $this->db->query("select * from menuchger2 where active='1'order by no asc");


        return $query;
    }
   

}