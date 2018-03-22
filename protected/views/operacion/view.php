<?php
$this->breadcrumbs=array(
	'Operacions'=>array('index'),
	$model->id_operacion,
);

$this->menu=array(
array('label'=>'Listar Operaciones','url'=>array('index')),
array('label'=>'Crear Operación','url'=>array('create')),
array('label'=>'Actualizar Operación','url'=>array('update','id'=>$model->id_operacion)),
array('label'=>'Eliminar Operación','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_operacion),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Administrar Operaciones','url'=>array('admin')),
);
?>

<span class="ez">Datos de la Operación</span>
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
function estatus($estatus){
    if($estatus == 0){
        $estatus = "Inactivo";
    }
    if($estatus == 1){
        $estatus = "Activo";
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

$this->widget('booster.widgets.TbDetailView',array(
'type' => 'striped bordered hover',
'data'=>$model,
'attributes'=>array(
		'id_operacion',
//		'id_exchange',
		array(
                    'label'=>'Exchange',
                    'value'=>$model->idExchange->exchange,
                ),
		array(
                    'label'=>'Tipo de Operación',
                    'value'=>$model->idEstatusOperacion->estatus_operacion,
                ),
		array(
                    'label'=>'Moneda',
                    'value'=>$model->idMoneda->abv.' ('.$model->idMoneda->moneda.')',
                ),
//		'id_moneda',
//		'id_estatus_operacion',
//		'id_tipo_operacion',
//		'compra1',
//		'compra2',
		array(
                    'label'=>'Compra en:',
                    'value'=>mostrarValor($model->compra1, '1').mostrarValor($model->compra2, '2'),
                ),
		array(
                    'label'=>'Venta en:',
                    'value'=>mostrarValor($model->venta_en, '1'),
                ),
//		'venta_en',
		array(
                    'label'=>'Target1',
                    'value'=>mostrarValor($model->target1, '1').mostrarValor($model->target11, '2').mostrarValor($model->porcentaje1, '3').estatusOperacion($model->estado1),
                ),
		array(
                    'label'=>'Target2',
                     'value'=>mostrarValor($model->target2, '1').mostrarValor($model->target22, '2').mostrarValor($model->porcentaje2, '3').estatusOperacion($model->estado2),
                ),
		array(
                    'label'=>'Target3',
                     'value'=>mostrarValor($model->target3, '1').mostrarValor($model->target33, '2').mostrarValor($model->porcentaje3, '3').estatusOperacion($model->estado3),
                ),
//		'target1',
//		'target11',
//		'porcentaje1',
//		'estado1',
//		'target2', 
//		'target22',
//		'porcentaje2',
//		'estado2',
//		'target3',
//		'target33',
//		'porcentaje3',
//		'estado3',
//		'target4',
//		'target44',
//		'porcentaje4',
//		'estado4',
//		'target5',
//		'target55',
//		'porcentaje5',
//		'estado5',
//		'stop_loss',
		array(
                    'label'=>'Stop Loss:',
                    'value'=>mostrarValor($model->stop_loss, '1'),
                ),
		array(
                    'label'=>'Resultado',
                    'value'=>$model->idTipoOperacion->tipo_operacion,
                ),
		array(
                    'label'=>'URL Moneda',
                    'type'=>'raw',
                    'value'=>CHtml::link($model->idMoneda->url, $model->idMoneda->url,array('target'=>'_blank')),
                    
                ),
//		'id_tipo_operacion',
		'observacion',
		array(
                    'label'=>'Estatus',
                    'value'=>estatus($model->estatus),
                ),
//		'id_usuario_sistema_reg',
//		'fecha_reg',
//		'ip_reg',
//		'id_usuario_sistema_mod',
//		'fecha_mod',
//		'ip_mod',
),
)); ?>
</div>
