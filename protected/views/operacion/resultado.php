<?php
$this->breadcrumbs=array(
	'Operaciones',
);
if(!Yii::app()->user->isGuest){
    $this->menu=array(
        array('label'=>'Crear Operación','url'=>array('create')),
        array('label'=>'Administrar Operaciones','url'=>array('admin')),
    );
}
?>

<style>
    .link{
        color: #FC5016;
    }
    .link:hover { color: #fff; } 
    .panelIndex{
    }
    .panelIndex:hover{
        padding: 5px;
        -webkit-box-shadow: -1px 2px 14px -2px rgba(0,0,0,0.75);
        -moz-box-shadow: -1px 2px 14px -2px rgba(0,0,0,0.75);
        box-shadow: -1px 2px 14px -2px rgba(0,0,0,0.75);
    }
</style>
<span class="ez">Resultados</span>

<div class="pd-inner">
<?php 
function estatusOperacion($estatus){
    if($estatus == 0){
        $estatus = Null;
    }
    if($estatus == 1){
        $estatus = " - Completado";
    }
    return $estatus;
}
function mostrarValor($valor, $tipo){
    if($valor && $valor != 0.00000000){
        if($tipo == 1){
            return $valor;
        }
        if($tipo == 2){
            return " - ".$valor;
        }
        if($tipo == 3){
            return " (".$valor."%)";
        }
    }else{
            return Null;
    }
}

function styloFormato($estatus){
    if($estatus == 2){
        //Compretada
        $style = "<font color='green' ><b>COMPLETADA</b></font>";
    }
    if($estatus == 3){
        //No Compretada
        $style = "<font color='RED' ><b>NO COMPLETADA</b></font>";
    }
    if($estatus == 4){
        //En proceso 
        $style = "<font color='BLUE' ><b>EN PROCESO</b></font>";       
    }
    return $style;
}

$operacione = new Operacion;

$i = 0;
?>
<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'operacion-form',
	'enableAjaxValidation'=>false,
)); ?> 
   

  <!--Mostrar todas las fianzas:-->
  <!--<input type="checkbox" id="include2" name="include2" value="false" />-->
  <div class="well container-fluid">
    <div class="row">
      <div class="col-md-5">
          <?php
            //$paseCompetidor->fecha_pase = date("d-m-Y", strtotime($paseCompetidorC->fecha_pase));
            echo $form->datePickerGroup($operacione, 'fecha_reg', array('widgetOptions' => array('options' => array('format' => 'dd-mm-yyyy'), 'htmlOptions' => array('class' => 'span5')), 'labelOptions' => array('label' => 'Fecha de Operación'), 'prepend' => '<i class="glyphicon glyphicon-calendar"></i>')); 
           ?>
      </div>
        
<!--      <div class="col-md-5">
          <?php 
//          $data = CHtml::listData(Exchange::model()->findAll(), 'id_exchange', 'exchange');
//            echo $form->dropDownListGroup($operacione,'id_exchange',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5'), 'data'=>array('0'=>'Seleccione...')+$data), 'labelOptions'=>array('label'=>'Exchange:'))); 
            ?>
      </div>-->
      <div class="col-md-2">
          <br>
          <?php 
          $this->widget('booster.widgets.TbButton', array(
			'buttonType'=>'submit',
			'context'=>'primary',
			'label'=>'Buscar',
		)); 
//            echo CHtml::link(
//                'Buscar', 
//                Yii::app()->createUrl('pago/create', array('id'=>'', 'tipo'=>1)), array('class' => 'btn btn-default link', 'style'=>'width: 100%; height: 35px;')
//            );
          ?>
      </div>
    </div>
      
  </div>
    
<?php 
//echo "Subscripcion = ".$subscripcion."<hr>";
if($subscripcion == 1){
    ?>
    <div class="alert alert-danger">
        ¡Usted debe de suscribirse para observar fechas superiores a la fecha actual!
    </div>
    <?php
    
}else{
?>  
  
<div class="row"><?php
$completada = 0;
$enProceso = 0;
$noCompletada = 0;
$ganancias = 0;
$porcentajeGanancia = 0;
$porcentajeTargetAlto = 0;
$stopLoss = 0;

if($dataProvider){

foreach ($dataProvider as $data){
    if($data->id_tipo_operacion == 2){
        $completada = $completada +1;
        $porcentajeGanancia = $porcentajeGanancia + 1;
    }
    if($data->id_tipo_operacion == 4){
        $enProceso = $enProceso +1;
    }
    if($data->id_tipo_operacion == 3){
        $noCompletada = $noCompletada +1;
        $stopLoss = $stopLoss + $data->porcentaje_stop_loss;
    }
    
    ?>
    <div class="col-sm-12 col-md-4">
        <div class="panel panel-default">
            <div class="panel-heading">
                <center>
                    <h4>
                        <img style="" src="<?php echo Yii::app()->request->baseUrl; ?>/images/exchange/<?php echo $data->idExchange->img; ?>">
                        <?php //echo CHtml::encode($data->idExchange->exchange); ?>
                    </h4>
                </center>
            </div>
            <div class="panel-body">
                
                

                <b><?php echo CHtml::encode($data->getAttributeLabel('id_estatus_operacion')); ?>:</b>
                <?php echo CHtml::encode($data->idEstatusOperacion->estatus_operacion); ?>
                <br />

                <b><?php echo CHtml::encode($data->getAttributeLabel('id_moneda')); ?>:</b>
                <?php echo CHtml::encode($data->idMoneda->abv.' ('.$data->idMoneda->moneda.')'); ?>
                <br />

                <?php if($data->compra1 != 0.00000000){ ?>
                <b><?php echo CHtml::encode($data->getAttributeLabel('compra1')); ?>:</b>
                <?php echo CHtml::encode(mostrarValor($data->compra1, '1').mostrarValor($data->compra2, '2')); ?>
                <br />
                <?php } ?>
                
                <?php if($data->venta_en != 0.00000000){ ?>
                <b><?php echo CHtml::encode($data->getAttributeLabel('venta_en')); ?>:</b>
                <?php echo CHtml::encode(mostrarValor($data->venta_en, '1')); ?>
                <br />
                <?php } ?>
                
                <?php if($data->target1 != 0.00000000){ ?>
                <b><?php echo CHtml::encode($data->getAttributeLabel('target1')); ?>:</b>
                <?php echo CHtml::encode(mostrarValor($data->target1, '1').mostrarValor($data->target11, '2').mostrarValor($data->porcentaje1, '3').estatusOperacion($data->estado1)); ?>
                <br />
                <?php } ?>
                
                <?php
                    if($data->estado1 != 0){
                        $target1 = $data->porcentaje1;
                    }else{
                        $target1 = 0;
                    }
                    if($data->estado2 != 0){
                        $target2 = $data->porcentaje2;
                    }else{
                        $target2 = 0;
                    }
                    if($data->estado3 != 0){
                        $target3 = $data->porcentaje3;
                    }else{
                        $target3 = 0;
                    }
                    
//                    echo "Target 1: ".$target1."<br>";
//                    echo "Target 2: ".$target2."<br>";
//                    echo "Target 3: ".$target3."<br>";
//                    
//                    echo "<hr>".max($target1, $target2, $target3)."<hr>";
                    $porcentajeTargetAlto = $porcentajeTargetAlto + max($target1, $target2, $target3);
//                    echo "<hr>".$porcentajeTargetAlto = $porcentajeTargetAlto + max($target1, $target2, $target3)."<hr>";
                
                ?>
                
                <?php if($data->target2 != 0.00000000){ ?>
                    <b><?php echo CHtml::encode($data->getAttributeLabel('target2')); ?>:</b>
                    <?php echo CHtml::encode(mostrarValor($data->target2, '1').mostrarValor($data->target22, '2').mostrarValor($data->porcentaje2, '3').estatusOperacion($data->estado2)); ?>
                    <br />
                <?php } ?>
                
                <?php if($data->target3 != 0.00000000){ ?>
                <b><?php echo CHtml::encode($data->getAttributeLabel('target3')); ?>:</b>
                <?php echo CHtml::encode(mostrarValor($data->target3, '1').mostrarValor($data->target33, '2').mostrarValor($data->porcentaje3, '3').estatusOperacion($data->estado3)); ?>
                <br />
                <?php } ?>
                
                <b><?php echo CHtml::encode($data->getAttributeLabel('stop_loss')); ?>:</b>
                <font color="red" >
                    <?php echo CHtml::encode(mostrarValor($data->stop_loss, '1')); ?>
                </font>
                <br />
                
                <b><?php echo "URL de la Moneda"; ?>:</b>
                <a href="<?php echo $data->idMoneda->url; ?>" target="_blank"><?php echo $data->idMoneda->url; ?></a>
                <br />
                
                
                
                
            </div>
            <div class="panel-heading">
                <h4><center>
                <b><?php echo CHtml::encode($data->getAttributeLabel('id_tipo_operacion')); ?>:</b>
                    <?php echo styloFormato($data->id_tipo_operacion); ?>
                    <?php //echo CHtml::encode($data->idTipoOperacion->tipo_operacion); ?>
                    </center>
                </h4>
            </div>
        </div>
    </div>
    
<!--    
    <div class="panelIndex view">

	


</div>-->
    
    <?php
    $i++;
    if($i == 3){
        $i=0;
        ?></div><div class="row"><?php
    }
    
}

//$this->widget('booster.widgets.TbListView',array(
//'dataProvider'=>$dataProvider,
//'itemView'=>'_view',
//)); 

//====================================================================================//
// Resultados
//====================================================================================//

$totalOperaciones = count($dataProvider);

?>
</div>
    <div class="row">
        <center>
            
            <div class="col-sm-12 col-md-4">
                
            </div>
        <div class="col-sm-12 col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <center>
                        <h4>
                            Resultados de Día
                        </h4>
                    </center>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-sm-12 col-md-8">
                             TOTAL OPERACIONES:
                        </div>
                        <div class="col-sm-12 col-md-4">
                            <?php echo $totalOperaciones; ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-8">
                             TOTAL COMPLETADAS:
                        </div>
                        <div class="col-sm-12 col-md-4">
                            <?php echo $completada; ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-8">
                             TOTAL EN PROCESO:
                        </div>
                        <div class="col-sm-12 col-md-4">
                            <?php echo $enProceso; ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-8">
                             TOTAL NO COMPLETADAS:
                        </div>
                        <div class="col-sm-12 col-md-4">
                            <?php echo $noCompletada; ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-8">
                             TOTAL GANANCIA:
                        </div>
                        <div class="col-sm-12 col-md-4">
                            <?php 
                                if($totalOperaciones > 0){
                                    $totalGanancia = $porcentajeTargetAlto - $stopLoss;
                                    echo number_format($totalGanancia, 2, '.', '')."%";
                                }else{
                                    echo "0";
                                }
                            ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-8">
                             PROMEDIO GANANCIA:
                        </div>
                        <div class="col-sm-12 col-md-4">
                            <?php 
                                if($totalOperaciones > 0){
                                    $promedioGanancia = ($porcentajeTargetAlto - $stopLoss)/$totalOperaciones;
                                    echo number_format($promedioGanancia, 2, '.', '')."%";
                                }else{
                                    echo "0";
                                }
                            ?>
                        </div>
                    </div>

                </div>
                <div class="panel-heading">
                    <center>
                        <div class="row">
                            <div class="col-sm-12 col-md-8">
                                 % EFECTIVIDAD:
                            </div>
                            <div class="col-sm-12 col-md-4">
                                <?php 
//                                die("Aqui: ".$totalOperaciones);
                                if($totalOperaciones > 0){
                                    $totalOperaciones = $totalOperaciones - $enProceso;
                                    $completada;
                                    if($totalOperaciones > 0){
                                        $totalEfectividad = ($completada * 100)/$totalOperaciones;
                                    }
                                    echo number_format($totalEfectividad, 2, '.', '')."%";
                                }else{
                                    echo "0";
                                }
                                ?>
                            </div>
                        </div>
                    </center>
                </div>
            </div>
        </div>
            
            <div class="col-sm-12 col-md-4">
                
            </div>
        </center>
    </div>   
<?php  
  }else{
    echo "<center>¡No existen resultados!</center>";
    }
}
?>  
  
</div>

<?php $this->endWidget(); ?>