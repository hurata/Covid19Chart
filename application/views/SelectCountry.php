<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php require 'helper/header.php';?>


<div class="container">
    <div class="row">
        <div class="chart">
            <canvas id="selectCountry" width="1200" height="400"></canvas>
        </div>
    </div>
</div>



<?php require 'helper/footer.php';?>

<script>

    var selectCountry = document.getElementById('selectCountry');
    var countryChart = new Chart(selectCountry, {
        type: 'line',
        data: {
            labels: [
                <?php

                foreach ($countryData as $data){
                    $date = date("Y-m-d", strtotime($data->date.' -1 day'));
                    $exp = explode("-", $date);
                    echo "'".$exp[1]."-".$exp[2]."',";
                }
                ?>
            ],
            datasets: [

                {
                    label: "<?php echo $countryName; ?>",
                    data: [
                        <?php
                        $totalCase = 0;
                        foreach ($countryData as $data){

                            $data = str_replace(",","",$data->newCase);
                            $totalCase = $totalCase + $data;
                            echo $totalCase.",";

                        }
                        ?>

                    ],
                    borderWidth: 2,
                    backgroundColor:'transparent',
                    borderColor:'#68f2e5',
                },
            ],





        },
        options: {
            responsive: true,
            title: {
                display: true,
                text:  'Vaka Sayısı İstatistikleri'
            },
            tooltips: {
                mode: 'index',
                intersect: false,
            },
            hover: {
                mode: 'nearest',
                intersect: true
            },
            scales: {
                xAxes: [{

                    display: true,
                    scaleLabel: {
                        display: true,
                        labelString: 'Month'
                    },


                }],
                yAxes: [{
                    display: true,
                    scaleLabel: {
                        display: true,
                        labelString: 'Value'
                    }
                }]
            }
        }
    });
</script>