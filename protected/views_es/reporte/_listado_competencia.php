<!--<script src="https://code.jquery.com/jquery.js"></script>
<script src="http://code.highcharts.com/stock/highstock.js"></script>
<script src="http://code.highcharts.com/modules/exporting.js"></script>-->

<?php


$this->breadcrumbs=array(
	'Reportes',
);

$this->menu=array(
//    array('label'=>'Create Reporte','url'=>array('create')),
//    array('label'=>'Manage Reporte','url'=>array('admin')),
    array('label'=>'Reportes por Competencia','url'=>Yii::app()->request->baseUrl.'/reporte/index'),
    array('label'=>'Listado participantes-competencia','url'=>Yii::app()->request->baseUrl.'/reporte/listadoCompetencia'),
);
?>

<span class="ez">Reporte: </span>

<div class="pd-inner">
    <div class="row">
        <div class="col-sm-12 col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Listado de Participantes por Competencia</div>
                <div class="panel-body">
                    
                    <div class="table-responsive">

                        <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Competencia</th>
                                    <th>Tipo Documentación</th>
                                    <th>Documentación</th>
                                    <th>Nombre</th>
                                    <th>Apellido</th>
                                    <!--<th>F. Nacimiento</th>-->
                                    <th>Teléfono</th>
                                    <th>Correo</th>
<!--                                    <th>Pais</th>
                                    <th>Ciudad</th>-->
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i =0;
                                foreach ($inscripciones as $inscripcion){
                                    $i++;
                                    ?>
                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo $inscripcion->idCopetencia->competencia; ?></td>
                                    <td>
                                        <?php 
                                        
                                        if($inscripcion->participantes->idUsuario->tipo_documento == 1){
                                            echo "Cédula Ciudadanía";
                                        }
                                        if($inscripcion->participantes->idUsuario->tipo_documento == 2){
                                            echo "Licencia de Conducir";
                                        }
                                        if($inscripcion->participantes->idUsuario->tipo_documento == 3){
                                            echo "Cédula de Extranjería";
                                        }
                                        if($inscripcion->participantes->idUsuario->tipo_documento == 4){
                                            echo "Pasaporte";
                                        }
                                        if($inscripcion->participantes->idUsuario->tipo_documento == 5){
                                            echo "Tarjeta de Identidad";
                                        }
                                        if($inscripcion->participantes->idUsuario->tipo_documento == 6){
                                            echo "Registro Civil";
                                        }
//                                        echo $inscripcion->participantes->idUsuario->tipo_documento; 
                                        ?>
                                    </td>
                                    <td><?php echo $inscripcion->participantes->idUsuario->cedula; ?></td>
                                    <td><?php echo $inscripcion->participantes->idUsuario->primer_nombre; ?></td>
                                    <td><?php echo $inscripcion->participantes->idUsuario->primer_apellido; ?></td>
                                    <!--<td><?php echo $inscripcion->participantes->idUsuario->fecha_nacimiento; ?></td>-->
                                    <td><?php echo $inscripcion->participantes->idUsuario->tlf_personal; ?></td>
                                    <td><?php echo $inscripcion->participantes->idUsuario->correo; ?></td>
<!--                                    <td><?php echo $inscripcion->participantes->idUsuario->idPais->pais; ?></td>
                                    <td><?php echo $inscripcion->participantes->idUsuario->ciudad; ?></td>-->
                                </tr>
                                    <?php
                                }
                                ?>
                            </tbody>
                            </table>


                        
                        
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
<!--    <div class="row">
        <div class="col-sm-12 col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Gráficos</div>
                <div class="panel-body">

                    <div id="container" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>

                </div>

            </div>
        </div>
    </div>-->
</div>
<?php
//$dato = array(name=>'Microsoft Internet Explorer', y=>53.33);
//$dato = json_encode($dato);
//$dato = array(array(name=>'prueba', y=>2), array(name=>'prueba2', y=>23),);
//$dato = +array(name=>'prueba2', y=>23);

//echo var_dump($dato)."<hr>";
//echo json_encode($dato);
//$dato = array(name=>$competencia->competencia, y=>);
//echo var_dump($dato)."<hr>";
?>

<!--<script type="text/javascript">

Highcharts.chart('container', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: 'Registros por Competencia'
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
                format: '<b>{point.name}</b>: {point.percentage:.1f}',
                style: {
                    color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                }
            }
        }
    },
    series: [{
        name: 'Inscripciones',
        colorByPoint: true,
        data: <?php echo json_encode($dato) ?>
    }]
});
</script>-->




<?php 



//$this->widget('booster.widgets.TbListView',array(
//'dataProvider'=>$dataProvider,
//'itemView'=>'_view',
//)); 
?>
