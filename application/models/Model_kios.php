<?php
class Model_kios extends CI_Model{
    

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->db = $this->load->database("kios_mysql", true);
    }
    
    
    function dkiosprinting($param){
        $this->db->select('*');
        $this->db->from('printingdocument');
        $this->db->where('airlines !=', 'Total');
        $this->db->where($param);
        $query = $this->db->get();

        return $query;
    }
   

}