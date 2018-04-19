<?php
class Guis extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->model('model_guis', 'guis');
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
        
        $data_airlines["menu"] = $this->menuchger->tampil_data();
        // $this->load->view('v_guis', $data_airlines);
        $this->template->load('template', 'v_guis', $data_airlines);

    }
   
    
    public function ajax_list(){

        $list   = $this->guis->get_datatables();
        $data   = array();
        $no     = $_POST['start'];
        $nomor  = 1;
        foreach ($list as $guis) {
            $no++;
            
            $aksi = '<a class="btn btn-xs btn-primary" href="javascript:void()" title="Edit" onclick="edit_guis('."'".$guis->guiid."'".')"><i class="fa fa-pencil"></i> edit</a>
                      <a class="btn  btn-xs btn-danger" href="javascript:void()" title="Hapus" onclick="delete_guis('."'".$guis->guiid."'".')"><i class="fa fa-trash"></i> delete</a>';
             
            $row = array(
                        "no"         => $no,
                        "guiid"          => $guis->guiid, 
                        "guifilename"        => $guis->guifilename,
                        "comment"        => $guis->comment,
                        "aksi"          => $aksi
                        );
            $data[] = $row;
            $nomor++;
        }

        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->guis->count_all(),
                        "recordsFiltered" => $this->guis->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }

    public function ajax_edit($id){
        
        $data = $this->guis->get_by_id($id);
        echo json_encode($data);
    }

    public function ajax_add(){
     
        $data = array(
                        'guiid' => $this->input->post('guiid'),
                        'guifilename' => $this->input->post('guifilename'),
                        'comment' => $this->input->post('comment')
                     );
        $insert = $this->guis->save($data);
        echo json_encode(array("status" => TRUE));
    }

    public function ajax_update(){
        
        $data = array(
                      'comment' => $this->input->post('comment'),
                      'guifilename' => $this->input->post('guifilename')
                    );
        $this->guis->update(array('guiid' => $this->input->post('guiid')), $data);
        echo json_encode(array("status" => TRUE));
        
    }

    public function ajax_delete($id){

        $this->guis->delete_by_id($id);
        echo json_encode(array("status" => TRUE));
    }


}