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

<span class="ez"><?php echo __('Report'); ?>: </span>

<div class="pd-inner">

    <div class="row">
        <div class="col-sm-12 col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading"><?php echo __('Results table'); ?></div>
                <div class="panel-body">
                    
                    <div class="table-responsive">
                    <table class="table table-bordered table-hover table-striped">
                        <thead>
                            <tr style=" background-color: #ccc;">
                                <td><center><?php echo __('Competence'); ?></center></td>
                                <td><center><?php echo __('Subscriptions'); ?></center></td>
                                <td><center><?php echo __('Paid'); ?></center></td>
                                <td><center><?php echo __('Pending to be paid'); ?></center></td>
<!--                                <td><center>Collected money</center></td>
                                <td><center>Money to be collected</center></td>-->
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $competencias = Competencia::model()->findAll('estatus = 1');
                            
                            foreach ($competencias as $competencia){
                                ?>
                                <tr>
                                    <td><center><?php echo $competencia->competencia; ?></center></td>
                                    <td>
                                        <center>
                                            <?php 
                                                $pasePagos = Pago::model()->findAll('id_tipo_pago = 1 AND id_copetencia ='.$competencia->id_copetencia);
                                                echo count($pasePagos); 
                                            ?>
                                        </center>
                                    </td>
                                    <?php if($competencia->gratis != 1){?>
                                        <td>
                                            <center>
                                                <?php 
                                                    $pasePagos = Pago::model()->findAll('id_tipo_pago = 1 AND id_copetencia ='.$competencia->id_copetencia.' AND id_pago_estatus = 2');
                                                    echo count($pasePagos); 
                                                ?>
                                            </center>
                                        </td>
                                        <td>
                                            <center>
                                                <?php 
                                                    $pasePagos = Pago::model()->findAll('id_tipo_pago = 1 AND id_copetencia ='.$competencia->id_copetencia.' AND id_pago_estatus = 1');
                                                    echo count($pasePagos); 
                                                ?>
                                            </center>
                                        </td>
                                        
                                    <?php }else{ ?>
                                    <td colspan="4"><center><?php echo __('Free'); ?></center></td>
                                    <?php } ?>
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



<?php 



//$this->widget('booster.widgets.TbListView',array(
//'dataProvider'=>$dataProvider,
//'itemView'=>'_view',
//)); 
?>
