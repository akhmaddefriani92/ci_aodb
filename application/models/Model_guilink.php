<?php
class Model_guilink extends CI_Model{
    
    var $table = 'guilink';
    
    var $column_order = array(null, 'guilink.ipaddress','guilink.guiid1', 'guilink.guiid2', 'guilink.guiid3', 'guilink.guiid4', 'guilink.guiid5', 'guilink.deletef', 'ipaddress.ipaddress', 'ipaddress.ipaddressinx', 'airlines.name' ); 
    
    
    // var $column = array('guilink.ipaddress','guilink.guiid1', 'guilink.guiid2', 'guilink.guiid3', 'guilink.guiid4', 'guilink.guiid5', 'guilink.deletef', 'ipaddress.ipaddress', 'ipaddress.ipaddressinx', 'airlines.Name');
    var $column_search = array('guilink.ipaddress','guilink.guiid1', 'guilink.guiid2', 'guilink.guiid3', 'guilink.guiid4', 'guilink.guiid5', 'guilink.deletef', 'ipaddress.ipaddress', 'ipaddress.ipaddressinx', 'airlines.name');

    var $order = array('ipaddress' => 'asc');

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    
    
    
    
    function tampildata()
    {
        $query= $this->db->query('select * from guilink');
        foreach($query->result_array() as $row=> $value){
        
            $data[]=$value;

        }
        
         return $data;
    }

    public function list_airlines(){
        $query= $this->db->query('select * from airlines');
        foreach($query->result_array() as $row=> $value){
            $data[]=$value;
        }
        return $data;
    }

    public function list_guis(){
        $query= $this->db->query('select * from guis');
        foreach($query->result_array() as $row=> $value){
            $data[]=$value;
        }
        return $data;
    }

    

    public function list_ipaddress(){
        $query= $this->db->query("select a.*, b.name from ipaddress a inner join airlines b on a.airlinesinx=b.airlinesinx order by a.ipaddress,b.name ");
        foreach($query->result_array() as $row=> $value){
            $data[]=$value;
        }
        
        return $data;
    }
    
    function get_one($id)
    {
        $param  =   array('guiid'=>$id);
        return $this->db->get_where('Users',$param);
    }
    
    private function _get_datatables_query()
    {
        
        $this->db->select($this->column_search); 
        $this->db->from('guilink');
        $this->db->join('ipaddress', 'guilink.ipaddress = ipaddress.ipaddressinx');
        $this->db->join('airlines', 'airlines.airlinesinx = ipaddress.airlinesinx');
        //add custom filter here
        if($this->input->post('airlinesinx'))
        {
            $this->db->where('airlines.airlinesinx', $this->input->post('airlinesinx'));
        }
        #$this->db->join($this->table, $this->table.'ipaddress=ipaddress.ipaddressinx');
        #$this->db->query("select a.*, b.Name from Users a inner join airlines b on a.airlinesinx=b.airlinesinx");

        $i = 0;
    
        foreach ($this->column_search as $item) // loop column 
        {
            if($_POST['search']['value']) // if datatable send POST for search
            {
                
                if($i===0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                }
                else
                {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if(count($this->column_search) - 1 == $i){ //last loop
                    $this->db->group_end(); //close bracket
                }    
            }
            $i++;
        }
        
        // here order processing
        if(isset($_POST['order'])) 
        {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } 
        else if(isset($this->order))
        {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
        
    }

    function get_datatables()
    {
        $this->_get_datatables_query();
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    public function get_by_id($id)
    {
        $this->db->from($this->table);
        $this->db->where('guilink.ipaddress',$id);
        $query = $this->db->get();

        return $query->row();
    }

    public function save($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    public function update($where, $data)
    {
        $this->db->update($this->table, $data, $where);
        return $this->db->affected_rows();
    }

    public function delete_by_id($id)
    {
        $this->db->where('guilink.ipaddress', $id);
        $this->db->delete($this->table);
    }


}