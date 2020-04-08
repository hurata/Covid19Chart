<?php

class SelectCountry extends CI_Controller{


    public function selected($country){

        $countyData = $this->CovidModel->getAllCountry($country);

        $viewData = array(
            "countryData" => $countyData,
            "countryName" => $country,

        );

        $this->load->view('SelectCountry',$viewData);


    }
}