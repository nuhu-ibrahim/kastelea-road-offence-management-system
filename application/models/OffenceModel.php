<?php

class OffenceModel extends MY_Model {
    
    const DB_TABLE = 'offences';
    const DB_TABLE_PK = 'offence_id';
    
    public $offence_id;
    
    public $category;
    
    public $points;
    
    public $code;
    
    public $offence_desc;
    
    public $penalty;
    
    
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