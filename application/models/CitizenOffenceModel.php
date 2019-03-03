<?php

class CitizenOffenceModel extends MY_Model {
    
    const DB_TABLE = 'citizen_offence_info';
    const DB_TABLE_PK = 'citizen_offence_id';
    
    public $citizen_offence_id;
    
    public $citizen_id;
    
    public $code_id;
    
    public $vehicle_reg_no;
    
    public $vehicle_make;
    
    public $vehicle_colour;
    
    public $vehicle_type;
    
    public $vehicle_ownership;
    
    public $report_location;
    
    public $report_date;
    
    public $offence_date;
    
    public $officer_type;
    
    public $officer_id;
    
    public $officer_comment;
    
    public $settlement;
    
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