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

<span class="ez"><?php echo __('Report: Inscriptions'); ?></span>

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
                                <td><center><?php echo __('Subscriptions'); ?></center></td>
                                <td><center><?php echo __('Paid'); ?></center></td>
                                <td><center><?php echo __('Pending to be paid'); ?></center></td>
                                <td><center><?php echo __('Collected money'); ?></center></td>
                                <td><center><?php echo __('Money to be collected'); ?></center></td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $competencias = Competencia::model()->findAll('estatus = 1');
                            $countPagada = 0;
                            $countPorPagar = 0;
                            $countPorPagar = 0;
                            $dRecaudado = 0;
                            $dPoRecaudado = 0;
                            $dato = array();
                            foreach ($competencias as $competencia){
                                
                                $criteria=new CDbCriteria;
                                $criteria->join = 'LEFT JOIN pago a ON (t.id_inscripcion = a.id_inscripcion)';
                                $criteria->addCondition('a.`id_tipo_pago` = 2 AND a.`id_copetencia` ='.$competencia->id_copetencia);
                                $inscripciones = Inscripcion::model()->findAll($criteria);
                                
                                $criteria=new CDbCriteria;
                                $criteria->select = 'SUM(costo_pagar) as costo_pagar';
                                $criteria->addCondition('id_copetencia ='.$competencia->id_copetencia.' AND id_inscripcion is not null AND id_pago_estatus = 2');
                                $pagadasSuma = Pago::model()->find($criteria);
                                
                                $pagadas = Pago::model()->findAll('id_tipo_pago = 2 AND id_copetencia = '.$competencia->id_copetencia.' AND id_inscripcion is not null AND id_pago_estatus = 2');
                                
                                
//                                foreach ($pagadas as $pagada){
//                                    echo var_dump($pagada);
//                                    //echo "Total: ".$pagada->total."<br>";
//                                }
                                
                                $criteria=new CDbCriteria;
                                $criteria->select = 'SUM(costo_pagar) as costo_pagar';
                                $criteria->addCondition('id_copetencia ='.$competencia->id_copetencia.' AND id_inscripcion is not null AND id_pago_estatus = 1');
                                $porpagarSuma = Pago::model()->find($criteria);
                                
                                $porpagar = Pago::model()->findAll('id_tipo_pago = 2 AND id_copetencia = '.$competencia->id_copetencia.' AND id_inscripcion is not null AND id_pago_estatus = 1');
                                /*foreach ($inscripciones as $inscripcion){
                                    
                                }*/
                                $countInsc += count($inscripciones);
                                if($competencia->gratis != 1){
                                    $countPagadas += count($pagadas);
                                    $countPorPagar += count($porpagar);
                                    $dRecaudado += $pagadasSuma->costo_pagar;
                                    $dPoRecaudado += $porpagarSuma->costo_pagar;
                                }
                                 $dato[] = array(name=>$competencia->competencia, y=>count($inscripciones));
                                
                            ?>
                            
                            
                            <tr>
                                <td><center><?php echo $competencia->competencia; ?></center></td>
                                <td><center><?php echo count($inscripciones); ?></center></td>
                                <?php if($competencia->gratis != 1){?>
                                    <td><center><?php echo count($pagadas); ?></center></td>
                                    <td><center><?php echo count($porpagar); ?></center></td>
                                    <td><center><?php if($pagadasSuma->costo_pagar){echo $pagadasSuma->costo_pagar;}else{ echo "0"; } ?></center></td>
                                    <td><center><?php if($porpagarSuma->costo_pagar){echo $porpagarSuma->costo_pagar;}else{ echo "0"; } ?></center></td>
                                <?php }else{ ?>
                                <td colspan="4"><center><?php echo __('Free'); ?></center></td>
                                <?php } ?>
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
                                <td><center><?php echo number_format($dRecaudado, 2, '.', ''); ?></center></td>
                                <td><center><?php echo number_format($dPoRecaudado, 2, '.', ''); ?></center></td>
                            </tr>
                        </tfoot>
                    </table>
                    </div>
                    <br>
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
                        </div> 
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12 col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading"><?php echo __('Graphics'); ?></div>
                <div class="panel-body">

                    

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
