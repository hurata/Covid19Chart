<?php
defined('BASEPATH') OR exit('No direct script access allowed');

error_reporting(0);
ini_set("display_errors", 0);

class CovidCovidDataTransferWorldMeter extends CI_Controller
{

    public function __construct()
    {

        parent::__construct();

    }


    public function curl($jsonURL)
    {

        $url = $jsonURL;
        $header[0] = "Accept: text/xml,application/xml,application/xhtml+xml,";
        $header[0] .= "text/html;q=0.9,text/plain;q=0.8,image/png,*/*;q=0.5";

        $header[] = "Cache-Control: max-age=0";
        $header[] = "Connection: keep-alive";
        $header[] = "Keep-Alive: 300";
        $header[] = "Accept-Charset: ISO-8859-1,utf-8;q=0.7,*;q=0.7";
        $header[] = "Accept-Language: en-us,en;q=0.5";
        $header[] = "Pragma: ";

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_USERAGENT, 'Googlebot/2.1 (+http://www.google.com/bot.html)');
        curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
        curl_setopt($curl, CURLOPT_REFERER, 'http://www.google.com');
        curl_setopt($curl, CURLOPT_ENCODING, 'gzip,deflate');
        curl_setopt($curl, CURLOPT_AUTOREFERER, true);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_TIMEOUT, 10);
        curl_setopt($curl, CURLOPT_VERBOSE, 1);

        $response = curl_exec($curl);
        curl_close($curl);
        return $response;
    }


    public function index()
    {


        $json = $this->curl("https://opendata.ecdc.europa.eu/covid19/casedistribution/json/");
        if (substr($json, 0, 3) == "\xEF\xBB\xBF") {
            $json = substr($json, 3);
        }
        $json = json_decode($json, true);


        foreach ($json['records'] as $data) {
            $date = $data['year'] . '-' . $data['month'] . '-' . $data['day'];
            $country = $data['countriesAndTerritories'];

            $dbControl = $this->CovidModel->controlDb($date, $country);

            if ($dbControl == null) {
                $insert = $this->CovidModel->insert(

                    array(
                        "country" => $data['countriesAndTerritories'],
                        "newDeaths" => $data['deaths'],
                        "newCase" => $data['cases'],
                        "popData" => $data['popData2018'],
                        "date" => $data['year'] . '-' . $data['month'] . '-' . $data['day']
                    )
                );

            }

        }

    }
}
