<?php
$this->breadcrumbs=array(
	'Tarifa Productos'=>array('index'),
	'Manage',
);

$this->menu=array(
array('label'=>'List TarifaProducto','url'=>array('index')),
array('label'=>'Create TarifaProducto','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('tarifa-producto-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<span  class="ez">Administración de Tarifa Productos</span>

<div class="pd-inner">
    <?php $this->widget('booster.widgets.TbGridView',array(
    'id'=>'tarifa-producto-grid',
    'dataProvider'=>$model->search(),
    'filter'=>$model,
    'columns'=>array(
        //'id_tarifa_producto',
		'tarifa_producto',
		//'id_pais',
        array(
            'filter'=>CHtml::listData(Producto::model()->findAll(),'id_producto','producto'),
            'name'=>'id_producto',
            'type'=>'raw',
            'value'=>'$data->idProducto->producto',
        ),
        array(
            'filter'=>CHtml::listData(Pais::model()->findAll(),'id_pais','pais'),
            'name'=>'id_pais',
            'type'=>'raw',
            'value'=>'$data->idPais->pais',
        ),
		//'estatus',
		//'id_usuario_registro',
        //'fecha_registro',
        array(
            'filter'=>CHtml::listData(Estatus::model()->findAll(),'estatus','estatus_titulo'),
            'name'=>'estatus',
            'type'=>'raw',
            'value'=>'$data->idEstatus->estatus_titulo',
        ),
		/*
		'id_usuario_modifica',
		'fecha_modifica',
		*/
    array(
    'class'=>'booster.widgets.TbButtonColumn',
    ),
    ),
    )); ?>
</div>