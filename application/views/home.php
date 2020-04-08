<?php defined('BASEPATH') OR exit('No direct script access allowed');?>

<?php require 'helper/header.php'; ?>



    <div class="container">
        <div class="row">
            <div class="chart">
                <canvas id="myChart" width="1200" height="400"></canvas>
            </div>
        </div>
    </div>






<?php require 'helper/footer.php';?>



<script>
    $(document).ready(function () {

        var ctx = document.getElementById('myChart');
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: [
                    <?php

                    foreach ($chinaData as $data) {
                        $date = date("Y-m-d", strtotime($data->date . ' -1 day'));
                        $exp = explode("-", $date);
                        echo "'" . $exp[1] . "-" . $exp[2] . "',";
                    }
                    ?>
                ],
                datasets: [

                    {
                        label: 'İspanya',
                        data: [
                            <?php
                            $totalCase = 0;
                            $countryDataCount = count($spainData);
                            $nan = $nanCount - $countryDataCount;

                            for ($i = 1; $i <= $nan; $i++) {

                                echo 'NaN,';

                            }
                            foreach ($spainData as $data) {

                                $data = str_replace(",", "", $data->newCase);
                                $totalCase = $totalCase + $data;
                                echo $totalCase . ",";

                            }
                            ?>

                        ],
                        borderWidth: 2,
                        backgroundColor: 'transparent',
                        borderColor: '#68f2e5',
                    },

                    {
                        label: 'İtalya ',
                        data: [
                            <?php

                            $totalCase = 0;
                            $countryDataCount = count($italyData);
                            $nan = $nanCount - $countryDataCount;

                            for ($i = 1; $i <= $nan; $i++) {

                                echo 'NaN,';

                            }
                            foreach ($italyData as $data) {

                                $data = str_replace(",", "", $data->newCase);
                                $totalCase = $totalCase + $data;
                                echo $totalCase . ",";

                            }
                            ?>

                        ],
                        borderWidth: 2,
                        backgroundColor: 'transparent',
                        borderColor: '#00f263',
                    },
                    {
                        label: 'Türkiye',
                        data: [
                            <?php

                            $totalCase = 0;
                            $countryDataCount = count($turkeyData);
                            $nan = $nanCount - $countryDataCount;

                            for ($i = 1; $i <= $nan; $i++) {

                                echo 'NaN,';

                            }
                            foreach ($turkeyData as $data) {


                                $data = str_replace(",", "", $data->newCase);
                                $totalCase = $totalCase + $data;
                                echo $totalCase . ",";


                            }

                            ?>

                        ],
                        borderWidth: 2,
                        backgroundColor: 'transparent',
                        borderColor: '#f20041',
                    },
                    {
                        label: 'Çin',
                        data: [
                            <?php

                            $totalCase = 0;
                            $countryDataCount = count($chinaData);
                            $nan = $nanCount - $countryDataCount;

                            for ($i = 1; $i <= $nan; $i++) {

                                echo 'NaN,';

                            }
                            foreach ($chinaData as $data) {


                                $data = str_replace(",", "", $data->newCase);
                                $totalCase = $totalCase + $data;
                                echo $totalCase . ",";


                            }

                            ?>

                        ],
                        borderWidth: 2,
                        backgroundColor: 'transparent',
                        borderColor: '#290906',
                    },

                    {
                        label: 'Amerika',
                        data: [
                            <?php

                            $totalCase = 0;
                            $countryDataCount = count($usaData);
                            $nan = $nanCount - $countryDataCount;

                            for ($i = 1; $i <= $nan; $i++) {

                                echo 'NaN,';

                            }
                            foreach ($usaData as $data) {


                                $data = str_replace(",", "", $data->newCase);
                                $totalCase = $totalCase + $data;
                                echo $totalCase . ",";


                            }

                            ?>

                        ],
                        borderWidth: 2,
                        backgroundColor: 'transparent',
                        borderColor: '#0f1983',
                    }


                ],


            },
            options: {
                responsive: true,
                title: {
                    display: true,
                    text: 'Türkiye Vaka Sayısı İstatistikleri'
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


    });
</script>