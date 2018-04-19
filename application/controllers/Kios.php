<?php
class Kios extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->model('model_kios', 'kios');
        $this->load->model('Model_menuchger', 'menuchger');
        $this->load->helper('url');
        // $this->load->library('template');
        $this->load->library(array('ion_auth', 'form_validation', 'template'));

        if (!$this->ion_auth->logged_in())
        {
            // redirect them to the login page
            redirect('auth/login', 'refresh');
        }
    }


    public function index(){
        $yest = date("Y-m-d", strtotime("-1 day"));
        $data["menu"] = $this->menuchger->tampil_data();
        $data["yest"] = $yest;
        // $this->load->view('v_guis', $data);
        $this->template->load('template', 'kios', $data);

    }
   
    
    public function ResultList(){
        $tanggal = $_POST["tanggal"];
        $kota = $_POST["kota"];

        $param = array('tanggal' => $tanggal, 'kota' => $kota);

        $data = $this->kios->dkiosprinting($param);
        $output =array();
        foreach ($data->result_array() as  $value) {
            $output[]=$value;
        }

        
        
        //output to json format
        echo json_encode($output);
    }

}