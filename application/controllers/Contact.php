<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller{

    public function index(){

        $array = array(
            "countries" => array(
                0 => array("country" => null, "population" => null, "stateCount" => null),
                1 => array("country" => "USA", "population" => 320000000, "stateCount" => 50),
                2 => array("country" => "Turkey", "population" => 83000000, "stateCount" => null)
            )
          );



        foreach ($array['countries'] as $item){

            if ($item['country'] != null && $item['population'] != null && $item['stateCount'] != null){
                echo $item['country']."<br><hr>";
            }


            if (!($item['country'] == null && $item['population'] == null && $item['stateCount'] == null)){
                echo $item['country']."<br>";
            }
        }
    }
}
?>
