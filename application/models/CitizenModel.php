<?php

class CitizenModel extends MY_Model {
    
    const DB_TABLE = 'citizen_info';
    const DB_TABLE_PK = 'citizen_id';
    
    public $citizen_id;
    
    public $firstname;
    
    public $middlename;
    
    public $lastname;
    
    public $sex;
    
    public $marital_status;
    
    public $state_of_origin;
    
    public $address;
    
    public $license_no;
    
    public $passport;
    
    
    /*public function get($limit = 0, $offset = 0) {
        if ($limit) {
            $query = $this->db->get($this::DB_TABLE, $limit, $offset);
        }
        else {
            $this->db->from($this::DB_TABLE);
            $this->db->order_by("date", "DESC");   
            $query = $this->db->get();
        }
        $ret_val = array();
        $class = get_class($this);
        foreach ($query->result() as $row) {
            $model = new $class;
            $model->populate($row);
            $ret_val[$row->{$this::DB_TABLE_PK}] = $model;
        }
        return $ret_val;
    }*/
}