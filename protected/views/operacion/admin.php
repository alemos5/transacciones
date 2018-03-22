<?php
$this->breadcrumbs=array(
	'Operacions'=>array('index'),
	'Administrar',
);

$this->menu=array(
array('label'=>'Listar Operaciones','url'=>array('index')),
array('label'=>'Crear Operación','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('operacion-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<span class="ez">Administración de Operación</span>
<div class="pd-inner">

<?php 
function estatus($estatus){
    if($estatus == 0){
        $estatus = "Inactivo";
    }
    if($estatus == 1){
        $estatus = "Activo";
    }
    return $estatus;
}
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

$this->widget('booster.widgets.TbGridView',array(
'id'=>'operacion-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
		'id_operacion',
		array(
                  'filter'=>CHtml::listData(Exchange::model()->findAll(),'id_exchange','exchange'),
                  'name'=>'id_exchange',
                  'type'=>'raw',
                  'value'=>'$data->idExchange->exchange',
                ),
		array(
                  'filter'=>CHtml::listData(EstatusOperacion::model()->findAll(),'id_estatus_operacion','estatus_operacion'),
                  'name'=>'id_estatus_operacion',
                  'type'=>'raw',
                  'value'=>'$data->idEstatusOperacion->estatus_operacion',
                ),
		array(
                  'filter'=>CHtml::listData(Moneda::model()->findAll(),'id_moneda','moneda'),
                  'name'=>'id_moneda',
                  'type'=>'raw',
                  'value'=>'$data->idMoneda->moneda',
                ),
//		'id_estatus_operacion',
//		'id_tipo_operacion',
                array(
                    'name'=>'compra1',
                    'value'=>'mostrarValor($data->compra1, "1")',

                ),
                array(
                    'name'=>'compra2',
                    'value'=>'mostrarValor($data->compra2, "1")',

                ),
                array(
                    'name'=>'venta_en',
                    'value'=>'mostrarValor($data->venta_en, "1")',

                ),
                array(
                  'filter'=>CHtml::listData(TipoOperacion::model()->findAll(),'id_tipo_operacion','tipo_operacion'),
                  'name'=>'id_tipo_operacion',
                  'type'=>'raw',
                  'value'=>'$data->idTipoOperacion->tipo_operacion',
                ),
                array(
                  //'filter'=>CHtml::listData(TipoOperacion::model()->findAll(),'id_tipo_operacion','tipo_operacion'),
                  'name'=>'fecha_reg',
                  'type'=>'raw',
                  'value'=>'date_format(new DateTime($data->fecha_reg), "d-m-Y")',
                ),
//                'fecha_reg',
//		'venta_en',
//                array(
//                        'name'=>'fecha_reg',
//                        'type'=>'raw',      
//                        'value'=>'($data->fecha_reg == 0000-00-00) ? "Not Set" : date_format(new DateTime($data->fecha_reg), "d-m-Y")',
//                       'filter' => $this->widget('zii.widgets.jui.CJuiDatePicker', array(
//                            'model' => $model, 
//                            'attribute' => 'fecha_reg',
//                            'options'=>array(
//                                'dateFormat'=>'dd-mm-yy',
//                                'changeYear'=>'true',
//                                'changeMonth'=>'true',
//                                'showAnim' =>'slide',
//                            ),
//                            'htmlOptions'=>array(
//                                'id'=>'fecha_reg',
//                            ),
//                          ), 
//                    true),
//                ),
		/*
		'target1',
		'target11',
		'porcentaje1',
		'estado1',
		'target2',
		'target22',
		'porcentaje2',
		'estado2',
		'target3',
		'target33',
		'porcentaje3',
		'estado3',
		'target4',
		'target44',
		'porcentaje4',
		'estado4',
		'target5',
		'target55',
		'porcentaje5',
		'estado5',
		'stop_loss',
		'observacion',
		'estatus',
		'id_usuario_sistema_reg',
		'fecha_reg',
		'ip_reg',
		'id_usuario_sistema_mod',
		'fecha_mod',
		'ip_mod',
		*/
array(
'class'=>'booster.widgets.TbButtonColumn',
),
),
)); ?>
