<script src="<?php echo Yii::app()->request->baseUrl; ?>/images/highcharts/code/highcharts.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/images/highcharts/code/modules/series-label.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/images/highcharts/code/modules/exporting.js"></script>

<?php
$this->pageTitle=Yii::app()->name;
$this->menu=array(
array('label'=>__('My Profile'),'url'=>array('/usuario/'.Yii::app()->user->id_usuario_sistema)),
array('label'=>__('Operaciones'),'url'=>array('/operacion/index')),
);
?>
<span  class="ez">
    Tu información
</span>

		
		
<?php
?>


<div class="pd-inner">
    <?php
    $api = "https://min-api.cryptocompare.com/data/price?fsym=BTC&tsyms=USD,JPY,EUR,ARS,BS";
    $json = file_get_contents($api);
    $data = json_decode($json, TRUE);
    ?>
    <div class="row">
        <div class="col-sm-12 col-md-6">
            <div class="panel panel-primary">
                <div class="panel-heading">Bitcoin</div>
                <div class="panel-body">
                    <ul class="list-group">
                        <li class="list-group-item">Dolar <span class="badge"><?php echo $data["USD"]; ?></span></li>
                        <li class="list-group-item">Euro <span class="badge"><?php echo $data["EUR"]; ?></span></li>
                        <li class="list-group-item">Pesos Argentinos <span class="badge"><?php echo $data["ARS"]; ?></span></li>
                        <li class="list-group-item">Bolívares <span class="badge"><?php echo $data["BS"]; ?></span></li>
                    </ul>
                </div>
            </div>
        </div>
        <?php
        $api = "https://s3.amazonaws.com/dolartoday/data.json";
        $json = file_get_contents($api);
        $data = json_decode($json, TRUE);
        ?>
        <div class="col-sm-12 col-md-6">
            <div class="panel panel-success">
                <div class="panel-heading">DolarTodays</div>
                <div class="panel-body">
                    <ul class="list-group">
                        <li class="list-group-item">Dolar <span class="badge"><?php echo $data["USD"]['dolartoday']; ?></span></li>
                        <li class="list-group-item">Euro <span class="badge"><?php echo $data["EUR"]['dolartoday']; ?></span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <br><br>
    <div class="panel-group" id="accordion">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">
                        Modelo gráfico 1</a>
                </h4>
            </div>
            <div id="collapse1" class="panel-collapse collapse">
                <div id="container" style="min-width: 400px; height: 400px; margin: 0 auto"></div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">
                        Modelo gráfico 2</a>
                </h4>
            </div>
            <div id="collapse2" class="panel-collapse collapse">
                <div id="container2" style="min-width: 400px; height: 400px; margin: 0 auto"></div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">
                        Modelo gráfico 3</a>
                </h4>
            </div>
            <div id="collapse3" class="panel-collapse collapse">
                <div id="container3" style="min-width: 400px; height: 400px; margin: 0 auto"></div>
            </div>
        </div>
    </div>

</div>

<script type="text/javascript">

    Highcharts.chart('container', {
        chart: {
            zoomType: 'xy'
        },
        title: {
            text: 'Average Monthly Weather Data for Tokyo'
        },
        subtitle: {
            text: 'Source: WorldClimate.com'
        },
        xAxis: [{
            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
                'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            crosshair: true
        }],
        yAxis: [{ // Primary yAxis
            labels: {
                format: '{value}°C',
                style: {
                    color: Highcharts.getOptions().colors[2]
                }
            },
            title: {
                text: 'Temperature',
                style: {
                    color: Highcharts.getOptions().colors[2]
                }
            },
            opposite: true

        }, { // Secondary yAxis
            gridLineWidth: 0,
            title: {
                text: 'Rainfall',
                style: {
                    color: Highcharts.getOptions().colors[0]
                }
            },
            labels: {
                format: '{value} mm',
                style: {
                    color: Highcharts.getOptions().colors[0]
                }
            }

        }, { // Tertiary yAxis
            gridLineWidth: 0,
            title: {
                text: 'Sea-Level Pressure',
                style: {
                    color: Highcharts.getOptions().colors[1]
                }
            },
            labels: {
                format: '{value} mb',
                style: {
                    color: Highcharts.getOptions().colors[1]
                }
            },
            opposite: true
        }],
        tooltip: {
            shared: true
        },
        legend: {
            layout: 'vertical',
            align: 'left',
            x: 80,
            verticalAlign: 'top',
            y: 55,
            floating: true,
            backgroundColor: (Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'
        },
        series: [{
            name: 'Rainfall',
            type: 'column',
            yAxis: 1,
            data: [49.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4, 194.1, 95.6, 54.4],
            tooltip: {
                valueSuffix: ' mm'
            }

        }, {
            name: 'Sea-Level Pressure',
            type: 'spline',
            yAxis: 2,
            data: [1016, 1016, 1015.9, 1015.5, 1012.3, 1009.5, 1009.6, 1010.2, 1013.1, 1016.9, 1018.2, 1016.7],
            marker: {
                enabled: false
            },
            dashStyle: 'shortdot',
            tooltip: {
                valueSuffix: ' mb'
            }

        }, {
            name: 'Temperature',
            type: 'spline',
            data: [7.0, 6.9, 9.5, 14.5, 18.2, 21.5, 25.2, 26.5, 23.3, 18.3, 13.9, 9.6],
            tooltip: {
                valueSuffix: ' °C'
            }
        }]
    });


    Highcharts.chart('container2', {
        chart: {
            zoomType: 'xy'
        },
        title: {
            text: 'Average Monthly Temperature and Rainfall in Tokyo'
        },
        subtitle: {
            text: 'Source: WorldClimate.com'
        },
        xAxis: [{
            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
                'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            crosshair: true
        }],
        yAxis: [{ // Primary yAxis
            labels: {
                format: '{value}°C',
                style: {
                    color: Highcharts.getOptions().colors[1]
                }
            },
            title: {
                text: 'Temperature',
                style: {
                    color: Highcharts.getOptions().colors[1]
                }
            }
        }, { // Secondary yAxis
            title: {
                text: 'Rainfall',
                style: {
                    color: Highcharts.getOptions().colors[0]
                }
            },
            labels: {
                format: '{value} mm',
                style: {
                    color: Highcharts.getOptions().colors[0]
                }
            },
            opposite: true
        }],
        tooltip: {
            shared: true
        },
        legend: {
            layout: 'vertical',
            align: 'left',
            x: 120,
            verticalAlign: 'top',
            y: 100,
            floating: true,
            backgroundColor: (Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'
        },
        series: [{
            name: 'Rainfall',
            type: 'column',
            yAxis: 1,
            data: [49.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4, 194.1, 95.6, 54.4],
            tooltip: {
                valueSuffix: ' mm'
            }

        }, {
            name: 'Temperature',
            type: 'spline',
            data: [7.0, 6.9, 9.5, 14.5, 18.2, 21.5, 25.2, 26.5, 23.3, 18.3, 13.9, 9.6],
            tooltip: {
                valueSuffix: '°C'
            }
        }]
    });

    Highcharts.setOptions({
        colors: Highcharts.map(Highcharts.getOptions().colors, function (color) {
            return {
                radialGradient: {
                    cx: 0.5,
                    cy: 0.3,
                    r: 0.7
                },
                stops: [
                    [0, color],
                    [1, Highcharts.Color(color).brighten(-0.3).get('rgb')] // darken
                ]
            };
        })
    });

    // Build the chart
    Highcharts.chart('container3', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: 'Browser market shares. January, 2015 to May, 2015'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                    style: {
                        color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                    },
                    connectorColor: 'silver'
                }
            }
        },
        series: [{
            name: 'Brands',
            data: [
                { name: 'IE', y: 56.33 },
                {
                    name: 'Chrome',
                    y: 24.03,
                    sliced: true,
                    selected: true
                },
                { name: 'Firefox', y: 10.38 },
                { name: 'Safari', y: 4.77 },
                { name: 'Opera', y: 0.91 },
                { name: 'Other', y: 0.2 }
            ]
        }]
    });

</script>