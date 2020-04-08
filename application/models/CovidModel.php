<?php

class CovidModel extends CI_Model{

    public function __construct(){
        parent::__construct();
    }

    public $tableName = "covidStat";

    /**
     * Country çektikten sonra  veri say en çok kimin ?
     * chart tarih olarak başlar
     */



    public function getAllCountry($country){

        $this->db->where('country', $country);
        $this->db->order_by('date', 'ASC');
        return $this->db->get($this->tableName)->result();

    }

    public function insert($data = array()){

        return $this->db->insert($this->tableName, $data);

    }

    public function controlDb($date, $country){

        $this->db->where('country', $country);
        $this->db->where('date', $date);
        return $this->db->get($this->tableName)->result();


    }

}