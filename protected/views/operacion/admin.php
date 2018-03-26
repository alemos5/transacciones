<?php
$this->breadcrumbs=array(
	'Operacions'=>array('index'),
	'Manage',
);

$this->menu=array(
array('label'=>'List Operacion','url'=>array('index')),
array('label'=>'Create Operacion','url'=>array('create')),
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

<span  class="ez">Administración de Operacions</span>

<div class="pd-inner">
    <?php $this->widget('booster.widgets.TbGridView',array(
    'id'=>'operacion-grid',
    'dataProvider'=>$model->search(),
    'filter'=>$model,
    'columns'=>array(
        //'id_operacion',
		//'code_operacion',
		//'id_tipo_operacion',
        array(
            'filter'=>CHtml::listData(TipoProducto::model()->findAll(),'id_tipo_producto','tipo_producto'),
            'name'=>'id_tipo_operacion',
            'type'=>'raw',
            'value'=>'$data->idTipoProducto->tipo_producto',
        ),
		//'id_pais',
        array(
            'filter'=>CHtml::listData(Pais::model()->findAll(),'id_pais','pais'),
            'name'=>'id_pais',
            'type'=>'raw',
            'value'=>'$data->idPais->pais',
        ),
		'monto_operacion',
        'monto_cierre',
		//'id_moneda_origen',
		'fecha_operacion',
		/*
		'id_moneda_destino',
		'monto_cierre',
		'fecha_operacion',
		'monto_oficial',
		'porcentaje_oficial',
		'monto_ganancia',
		'porcentaje_ganancia',
		'id_producto',
		'tarifa',
		'id_cuenta_salida',
		'id_cuenta_entrada',
		'id_usuario_registro',
		'fecha_registro',
		'id_usuario_modifica',
		'fecha_modifica',
		*/
    array(
    'class'=>'booster.widgets.TbButtonColumn',
    ),
    ),
    )); ?>
</div>