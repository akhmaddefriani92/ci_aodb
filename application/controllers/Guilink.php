<?php
class Guilink extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->model('model_guilink', 'guilink');
        $this->load->model('Model_menuchger', 'menuchger');
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library(array('ion_auth', 'form_validation','template'));
        if (!$this->ion_auth->logged_in())
        {
            // redirect them to the login page
            redirect('auth/login', 'refresh');
        }
    }


    public function index(){
                

        $data["menu"] = $this->menuchger->tampil_data();
        $data["airlines"] = $this->guilink->list_airlines();
        $data["guis"] = $this->guilink->list_guis();
        $data["ipaddress"] = $this->guilink->list_ipaddress();

        //$data["ipaddress"] = $this->ipaddress->tampil_data2();
        //$data["guis"] = $this->guis->tampil_data();
        // $this->load->view('v_guilink', $data);
        $this->template->load('template', 'v_guilink', $data);

    }
   
    
    public function ajax_list(){

        $list   = $this->guilink->get_datatables();
        $data   = array();
        $no     = $_POST['start'];
        $nomor  = 1;
        //print_r($list);
        foreach ($list as $guilink) {
            $no++;
            
            
            $aksi = '<a class="btn btn-sm btn-primary" href="javascript:void()" title="Edit" onclick="edit_guilink('."'".$guilink->ipaddressinx."'".')"><i class="fa fa-pencil"></i></a>
                      <a class="btn btn-sm btn-danger" href="javascript:void()" title="Hapus" onclick="delete_guilink('."'".$guilink->ipaddressinx."'".')"><i class="fa fa-trash"></i></a>';
            /*
           $row_ip = $this->ipaddress->get_one($guilink->IPAddressINX);           
            
           $IPAddress= $row_ip->IPAddress;

           $AirlinesINX = $row_ip->AirlinesINX;
           $Name        = $this->airlines->get_one($AirlinesINX);
           */
           

             
            $row = array(
                
                        "no"         => $no,
                        "ipaddress"        => $guilink->ipaddress,
                        "name"        => $guilink->name,
                        "guiid1"          => $guilink->guiid1, 
                        "guiid2"          => $guilink->guiid2, 
                        "guiid3"          => $guilink->guiid3, 
                        "guiid4"          => $guilink->guiid4, 
                        "guiid5"          => $guilink->guiid5, 
                        "deletef"        => $guilink->deletef,
                        "aksi"          => $aksi
                        );
            $data[] = $row;
            $nomor++;
        }

        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->guilink->count_all(),
                        "recordsFiltered" => $this->guilink->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }

    public function ajax_edit($id){
        
        $data = $this->guilink->get_by_id($id);
        echo json_encode($data);
    }

    public function ajax_add(){
        
        // $this->_validate();
        $data = array(
                        'ipaddress' => $this->input->post('ipaddress'),
                        'guiid1' => $this->input->post('guiid1'),
                        'guiid2' => $this->input->post('guiid2'),
                        'guiid3' => $this->input->post('guiid3'),
                        'guiid4' => $this->input->post('guiid4'),
                        'guiid5' => $this->input->post('guiid5'),
                        'deletef' => $this->input->post('deletef')
                );
        
        $insert = $this->guilink->save($data);
        echo json_encode(array("status" => TRUE));

    }

    public function ajax_update(){
        // $this->_validate();
        $data = array(
                        
                        'guiid1' => $this->input->post('guiid1'),
                        'guiid2' => $this->input->post('guiid2'),
                        'guiid3' => $this->input->post('guiid3'),
                        'guiid4' => $this->input->post('guiid4'),
                        'guiid5' => $this->input->post('guiid5'),
                        'deletef' => $this->input->post('deletef')
                    );
        $this->guilink->update(array('ipaddress' => $this->input->post('ipaddress')), $data);
        echo json_encode(array("status" => TRUE));
        
    }

    public function ajax_delete($id){

        $this->guilink->delete_by_id($id);
        echo json_encode(array("status" => TRUE));
    }

    private function _validate()
    {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;

        if($this->input->post('deletef') == '')
        {
            $data['inputerror'][] = 'deletef';
            $data['error_string'][] = 'deletef is required and default 0';
            $data['status'] = FALSE;
        }
        
        if($data['status'] === FALSE)
        {
            echo json_encode($data);
            exit();
        }
    }


}