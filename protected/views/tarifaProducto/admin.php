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
    		'id_tarifa_producto',
		'tarifa_producto',
		'id_pais',
		'estatus',
		'id_usuario_registro',
		'fecha_registro',
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