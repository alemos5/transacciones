<!--<script src="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css"></script>
<script src="http://code.highcharts.com/stock/highstock.js"></script>
<script src="http://code.highcharts.com/modules/exporting.js"></script>-->
<!--<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.css">
  
<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.js"></script>-->
<!--<script src="http://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>-->



<style>
/*td.highlight {
    background-color: whitesmoke !important;
}    */
</style>
    
<script>
//$(document).ready( function () {
////    $('#example').DataTable();
//    var table = $('#example').DataTable( {
//        "columnDefs": [
//          { "width": "20%", "targets": 0 }
//        ]
//      });
//     
//    $('#example tbody')
//        .on( 'mouseenter', 'td', function () {
//            var colIdx = table.cell(this).index().column;
// 
//            $( table.cells().nodes() ).removeClass( 'highlight' );
//            $( table.column( colIdx ).nodes() ).addClass( 'highlight' );
//        } );
//
//    
//
//} );    
</script>
    <?php


$this->breadcrumbs=array(
	'Reportes',
);

$this->menu=array(
    array('label'=>__('Reports by competence'),'url'=>Yii::app()->request->baseUrl.'/reporte/index'),
    array('label'=>__('Participants list-competition'),'url'=>Yii::app()->request->baseUrl.'/reporte/listadoCompetencia'),
    array('label'=>__('List by categories'),'url'=>Yii::app()->request->baseUrl.'/reporte/listadoCategoria'),
);
?>

<span class="ez"><?php echo __('Report'); ?>: </span>

<div class="pd-inner">
    
    <div class="panel panel-default">
        <div class="panel-heading"><?php echo __('Competitor Passes'); ?></div>
        <div class="panel-body">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <td><center><strong><?php echo __('Competencies'); ?></strong></center></td>
                        <td><center><strong><?php echo __('Amount Passes'); ?></strong></center></td>
                        <td><center><strong><?php echo __('For Paying'); ?></strong></center></td>
                        <td><center><strong><?php echo __('For collecting'); ?></strong></center></td>
                        <td><center><strong><?php echo __('Paid'); ?></strong></center></td>
                        <td><center><strong><?php echo __('Raised'); ?></strong></center></td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $competenciasPases = Competencia::model()->findAll('estatus = 1');
                    foreach ($competenciasPases as $competenciasPase){
                        if($competenciasPase->gratis == 1){
                            ?>
                            <tr>
                                <td><center><?php echo $competenciasPase->competencia; ?></center></td>
                                <td colspan="5">
                                    <center>
                                        <?php echo __('Free'); ?>
                                    </center>
                                </td>
                            </tr>
                            <?php
                        }else{
                        ?>
                        <tr>
                            <td><center><?php echo $competenciasPase->competencia; ?></center></td>
                            <td>
                                <center>
                                    <?php 
                                        $paseCompetencia = Pago::model()->findAll('id_tipo_pago = 1 AND id_copetencia ='.$competenciasPase->id_copetencia);
                                        echo count($paseCompetencia);
                                    ?>
                                </center>
                            </td>
                            <td>
                                <center>
                                    <?php 
                                        $paseCompetencia = Pago::model()->findAll('id_tipo_pago = 1 AND id_copetencia ='.$competenciasPase->id_copetencia.' AND id_pago_estatus = 1');
                                        echo count($paseCompetencia);
                                    ?>
                                </center>
                            </td>
                            <td>
                                <center>
                                    <?php 
                                        $paseCompetencias = Pago::model()->findAll('id_tipo_pago = 1 AND id_copetencia ='.$competenciasPase->id_copetencia.' AND id_pago_estatus = 1');
                                        $porRecaudar = 0;
                                        foreach ($paseCompetencias as $paseCompetencia){
                                            $porRecaudar += $paseCompetencia->costo_pagar;
                                        }
                                        echo $porRecaudar;
                                    ?>
                                </center>
                            </td>
                            <td>
                                <center>
                                    <?php 
                                        $paseCompetencia = Pago::model()->findAll('id_tipo_pago = 1 AND id_copetencia ='.$competenciasPase->id_copetencia.' AND id_pago_estatus = 2');
                                        echo count($paseCompetencia);
                                    ?>
                                </center>
                            </td>
                            <td>
                                <center>
                                    <?php 
                                        $paseCompetencias = Pago::model()->findAll('id_tipo_pago = 1 AND id_copetencia ='.$competenciasPase->id_copetencia.' AND id_pago_estatus = 2');
                                        $recaudados = 0;
                                        foreach ($paseCompetencias as $paseCompetencia){
                                            $recaudados += $paseCompetencia->costo_pagar;
                                        }
                                        echo $recaudados;
                                    ?>
                                </center>
                            </td>
                        </tr>
                        <?php
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    
    <div class="row">
        <div class="col-sm-12 col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading"><?php echo __('Registration'); ?></div>
                <div class="panel-body">
                    
                    <div class="table-responsive">

                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <td><center><strong><?php echo __('Competencies'); ?></strong></center></td>
                                    <td><center><strong><?php echo __('Number of inscriptions'); ?></strong></center></td>
                                    <td><center><strong><?php echo __('For Paying'); ?></strong></center></td>
                                    <td><center><strong><?php echo __('For collecting'); ?></strong></center></td>
                                    <td><center><strong><?php echo __('Paid'); ?></strong></center></td>
                                    <td><center><strong><?php echo __('Raised'); ?></strong></center></td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $competenciasPases = Competencia::model()->findAll('estatus = 1');
                                foreach ($competenciasPases as $competenciasPase){
                                    if($competenciasPase->gratis == 1){
                                        ?>
                                        <tr>
                                            <td><center><?php echo $competenciasPase->competencia; ?></center></td>
                                            <td colspan="5">
                                                <center>
                                                    <?php echo __('Free'); ?>
                                                </center>
                                            </td>
                                        </tr>
                                        <?php
                                    }else{
                                    ?>
                                    <tr>
                                        <td><center><?php echo $competenciasPase->competencia; ?></center></td>
                                        <td>
                                            <center>
                                                <?php 
                                                    $paseInscripcion = Pago::model()->findAll('id_tipo_pago = 2 AND id_copetencia ='.$competenciasPase->id_copetencia);
                                                    echo count($paseInscripcion);
                                                ?>
                                            </center>
                                        </td>
                                        <td>
                                            <center>
                                                <?php 
                                                    $paseInscripcion = Pago::model()->findAll('id_tipo_pago = 2 AND id_copetencia ='.$competenciasPase->id_copetencia.' AND id_pago_estatus = 1');
                                                    echo count($paseInscripcion);
                                                ?>
                                            </center>
                                        </td>
                                        <td>
                                            <center>
                                                <?php 
                                                    $paseInscripciones = Pago::model()->findAll('id_tipo_pago = 2 AND id_copetencia ='.$competenciasPase->id_copetencia.' AND id_pago_estatus = 1');
                                                    $porRecaudar = 0;
                                                    foreach ($paseInscripciones as $paseInscripcion){
                                                        $porRecaudar += $paseInscripcion->costo_pagar;
                                                    }
                                                    echo $porRecaudar;
                                                ?>
                                            </center>
                                        </td>
                                        <td>
                                            <center>
                                                <?php 
                                                    $paseInscripcion = Pago::model()->findAll('id_tipo_pago = 2 AND id_copetencia ='.$competenciasPase->id_copetencia.' AND id_pago_estatus = 2');
                                                    echo count($paseInscripcion);
                                                ?>
                                            </center>
                                        </td>
                                        <td>
                                            <center>
                                                <?php 
                                                    $paseInscripciones = Pago::model()->findAll('id_tipo_pago = 2 AND id_copetencia ='.$competenciasPase->id_copetencia.' AND id_pago_estatus = 2');
                                                    $recaudados = 0;
                                                    foreach ($paseInscripciones as $paseInscripcion){
                                                        $recaudados += $paseInscripcion->costo_pagar;
                                                    }
                                                    echo $recaudados;
                                                ?>
                                            </center>
                                        </td>
                                    </tr>
                                    <?php
                                    }
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
