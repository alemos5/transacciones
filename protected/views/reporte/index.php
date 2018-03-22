<script src="https://code.jquery.com/jquery.js"></script>
<script src="http://code.highcharts.com/stock/highstock.js"></script>
<script src="http://code.highcharts.com/modules/exporting.js"></script>

<?php
$this->breadcrumbs=array(
	'Reports',
);

$this->menu=array(
//    array('label'=>'Create Reporte','url'=>array('create')),
//    array('label'=>'Manage Reporte','url'=>array('admin')),
    array('label'=>__('Reports by competence'),'url'=>Yii::app()->request->baseUrl.'/reporte/index'),
    array('label'=>__('Participants list-competition'),'url'=>Yii::app()->request->baseUrl.'/reporte/listadoCompetencia'),
    array('label'=>__('List by categories'),'url'=>Yii::app()->request->baseUrl.'/reporte/listadoCategoria'),
    array('label'=>__('List by competitive pass'),'url'=>Yii::app()->request->baseUrl.'/reporte/listadoPagoPase'),
);


?>

<span class="ez"><?php echo __('Report: General'); ?></span>

<div class="pd-inner">

    <div class="row">
        <div class="col-sm-12 col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading"><?php echo __('Results table: Competitive Pass'); ?></div>
                <div class="panel-body">
                    
                    <div class="table-responsive">
                    <table class="table table-bordered table-hover table-striped">
                        <thead>
                            <tr style=" background-color: #ccc;">
                                <td><center><?php echo __('Competence'); ?></center></td>
                                <td><center><?php echo __('# Pass'); ?></center></td>
                                <td><center><?php echo __('Validated'); ?></center></td>
                                <td><center><?php echo __('For validating'); ?></center></td>
                                <td><center><?php echo __('Collected money'); ?></center></td>
                                <td><center><?php echo __('Money to be collected'); ?></center></td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $or = 'id_tipo_pago = 1 group by `id_copetencia`, `id_tipo_pago`';
                            $pagos = Pago::model()->findAll(array(
                                                                'select'=>'id_copetencia, id_tipo_pago',
                                                                'condition'=>$or
                                                               ));
                            
                            $valorRecaudadoTotal = 0;
                            $valorPorRecaudadoTotal = 0;
                            foreach ($pagos as $pago){
                                ?>
                                <tr>
                                    <td><center><?php echo $pago->idCompetencia->competencia; ?></center></td>
                                    <?php if(!$pago->idCompetencia->gratis == 1){ ?>
                                    <td>
                                        <center>
                                            <?php  
                                            $countPago = Pago::model()->findAll('id_tipo_pago = 1 AND id_copetencia ='.$pago->id_copetencia);
                                            echo count($countPago);
                                            ?>
                                        </center>
                                    </td>
                                    <td>
                                        <center>
                                            <?php  
                                            $countPago = Pago::model()->findAll('id_tipo_pago = 1 AND id_copetencia ='.$pago->id_copetencia.' AND id_pago_estatus = 2');
                                            echo count($countPago);
                                            ?>
                                        </center>
                                    </td>
                                    <td>
                                        <center>
                                            <?php  
                                            $countPago = Pago::model()->findAll('id_tipo_pago = 1 AND id_copetencia ='.$pago->id_copetencia.' AND id_pago_estatus = 1');
                                            echo count($countPago);
                                            ?>
                                        </center>
                                    </td>
                                    </td>
                                    <td>
                                        <center>
                                            <?php  
                                            $sumaPagos = Pago::model()->findAll('id_tipo_pago = 1 AND id_copetencia ='.$pago->id_copetencia.' AND id_pago_estatus = 2');
                                            $valorRecaudado = 0;
                                            foreach ($sumaPagos as $sumaPago){
                                                $valorRecaudado += $sumaPago->costo_pagar;
                                            }
                                            $valorRecaudadoTotal += $valorRecaudado;
                                            echo number_format($valorRecaudado, 2, '.', ',');
                                            ?>
                                        </center>
                                    </td>
                                    </td>
                                    <td>
                                        <center>
                                            <?php  
                                            $sumaPagos = Pago::model()->findAll('id_tipo_pago = 1 AND id_copetencia ='.$pago->id_copetencia.' AND id_pago_estatus = 1');
                                            $valorPorRecaudar = 0;
                                            foreach ($sumaPagos as $sumaPago){
                                                $valorPorRecaudar += $sumaPago->costo_pagar;
                                            }
                                            $valorPorRecaudadoTotal += $valorPorRecaudar;
                                            echo number_format($valorPorRecaudar, 2, '.', ',');
                                            ?>
                                        </center>
                                    </td>
                                    <?php }else{ ?>
                                    <td colspan="5"><center><?php echo __('Free'); ?></center></td>
                                <?php }?>
                                </tr>
                                
                                <?php
                                
                            }
                                
                            ?>
                        </tbody>
                        <tfoot>
                            <tr style=" background-color: #ccc">
                                <td><center><?php echo __('Totales'); ?></center></td>
                                <td><center><?php echo $countInsc; ?></center></td>
                                <td><center><?php echo $countPagadas; ?></center></td>
                                <td><center><?php echo $countPorPagar; ?></center></td>
                                <td><center><?php echo number_format($valorRecaudadoTotal, 2, ".", ",");  ?></center></td>
                                <td><center><?php echo number_format($valorPorRecaudadoTotal, 2, '.', ','); ?></center></td>
                            </tr>
                        </tfoot>
                    </table>
                    </div>
<!--                    <br>
                        <div class="panel-group">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" href="#collapse1">
                                            <?php echo __('Graphics'); ?>
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapse1" class="panel-collapse collapse in">
                                    <div class="panel-body">
                                        <div id="container" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12 col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading"><?php echo __('Results table: Category inscription'); ?></div>
                <div class="panel-body">
                    
                    <div class="table-responsive">
                    <table class="table table-bordered table-hover table-striped">
                        <thead>
                            <tr style=" background-color: #ccc;">
                                <td><center><?php echo __('Competence'); ?></center></td>
                                <td><center><?php echo __('# Registration'); ?></center></td>
                                <td><center><?php echo __('Validated'); ?></center></td>
                                <td><center><?php echo __('For validating'); ?></center></td>
                                <td><center><?php echo __('Collected money'); ?></center></td>
                                <td><center><?php echo __('Money to be collected'); ?></center></td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $or = 'id_tipo_pago = 1 group by `id_copetencia`, `id_tipo_pago`';
                            $pagos = Pago::model()->findAll(array(
                                                                'select'=>'id_copetencia, id_tipo_pago',
                                                                'condition'=>$or
                                                               ));
                            
                            $valorRecaudadoTotal = 0;
                            $valorPorRecaudadoTotal = 0;
                            foreach ($pagos as $pago){
                                ?>
                                <tr>
                                    <td><center><?php echo $pago->idCompetencia->competencia; ?></center></td>
                                    <?php if(!$pago->idCompetencia->gratis == 1){ ?>
                                    <td>
                                        <center>
                                            <?php  
                                            $countPago = Pago::model()->findAll('id_tipo_pago = 2 AND id_copetencia ='.$pago->id_copetencia);
                                            echo count($countPago);
                                            ?>
                                        </center>
                                    </td>
                                    <td>
                                        <center>
                                            <?php  
                                            $countPago = Pago::model()->findAll('id_tipo_pago = 2 AND id_copetencia ='.$pago->id_copetencia.' AND id_pago_estatus = 2');
                                            echo count($countPago);
                                            ?>
                                        </center>
                                    </td>
                                    <td>
                                        <center>
                                            <?php  
                                            $countPago = Pago::model()->findAll('id_tipo_pago = 2 AND id_copetencia ='.$pago->id_copetencia.' AND id_pago_estatus = 1');
                                            echo count($countPago);
                                            ?>
                                        </center>
                                    </td>
                                    </td>
                                    <td>
                                        <center>
                                            <?php  
                                            $sumaPagos = Pago::model()->findAll('id_tipo_pago = 2 AND id_copetencia ='.$pago->id_copetencia.' AND id_pago_estatus = 2');
                                            $valorRecaudado = 0;
                                            foreach ($sumaPagos as $sumaPago){
                                                $valorRecaudado += $sumaPago->costo_pagar;
                                            }
                                            $valorRecaudadoTotal += $valorRecaudado;
                                            echo number_format($valorRecaudado, 2, '.', ',');
                                            ?>
                                        </center>
                                    </td>
                                    </td>
                                    <td>
                                        <center>
                                            <?php  
                                            $sumaPagos = Pago::model()->findAll('id_tipo_pago = 2 AND id_copetencia ='.$pago->id_copetencia.' AND id_pago_estatus = 1');
                                            $valorPorRecaudar = 0;
                                            foreach ($sumaPagos as $sumaPago){
                                                $valorPorRecaudar += $sumaPago->costo_pagar;
                                            }
                                            $valorPorRecaudadoTotal += $valorPorRecaudar;
                                            echo number_format($valorPorRecaudar, 2, '.', ',');
                                            ?>
                                        </center>
                                    </td>
                                    <?php }else{ ?>
                                    <td colspan="5"><center><?php echo __('Free'); ?></center></td>
                                <?php }?>
                                </tr>
                                
                                <?php
                                
                            }
                                
                            ?>
                        </tbody>
                        <tfoot>
                            <tr style=" background-color: #ccc">
                                <td><center><?php echo __('Totales'); ?></center></td>
                                <td><center><?php echo $countInsc; ?></center></td>
                                <td><center><?php echo $countPagadas; ?></center></td>
                                <td><center><?php echo $countPorPagar; ?></center></td>
                                <td><center><?php echo number_format($valorRecaudadoTotal, 2, '.', ','); ?></center></td>
                                <td><center><?php echo number_format($valorPorRecaudadoTotal, 2, '.', ','); ?></center></td>
                            </tr>
                        </tfoot>
                    </table>
                    </div>
<!--                    <br>
                        <div class="panel-group">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" href="#collapse1">
                                            <?php echo __('Graphics'); ?>
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapse1" class="panel-collapse collapse in">
                                    <div class="panel-body">
                                        <div id="container" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                </div>
            </div>
        </div>
    </div>
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

<script type="text/javascript">

Highcharts.chart('container', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: 'Subscriptions by competence'
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
</script>




<?php 



//$this->widget('booster.widgets.TbListView',array(
//'dataProvider'=>$dataProvider,
//'itemView'=>'_view',
//)); 
?>
