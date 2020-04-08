<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Home extends CI_Controller {

    public function __construct(){
        parent::__construct();
    }






    function index(){

        $spainData = $this->CovidModel->getAllCountry("Spain");
        $italyData = $this->CovidModel->getAllCountry("Italy");
        $turkeyData = $this->CovidModel->getAllCountry("Turkey");
        $chinaData = $this->CovidModel->getAllCountry("China");
        $usaData = $this->CovidModel->getAllCountry("United_States_Of_America");

        $nanCount = count($chinaData);

        $viewData = array(
          "spainData"  => $spainData,
          "italyData"  => $italyData,
          "turkeyData" => $turkeyData,
          "chinaData" => $chinaData,
          "usaData"   => $usaData,
          "nanCount"  => $nanCount

        );

        $this->load->view('home',$viewData);

    }



}