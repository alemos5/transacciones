<?php
$this->breadcrumbs=array(
	'Productos'=>array('index'),
	'Manage',
);

$this->menu=array(
array('label'=>'List Producto','url'=>array('index')),
array('label'=>'Create Producto','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('producto-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<span  class="ez">Administración de Productos</span>

<div class="pd-inner">
    <?php $this->widget('booster.widgets.TbGridView',array(
    'id'=>'producto-grid',
    'dataProvider'=>$model->search(),
    'filter'=>$model,
    'columns'=>array(
    		'id_producto',
		'id_tipo_producto',
		'productoc',
		'descripcion',
		'estatus',
		'id_usuario_registro',
		/*
		'fecha_registro',
		'id_usuario_modifica',
		'fecha_modifica',
		'img',
		*/
    array(
    'class'=>'booster.widgets.TbButtonColumn',
    ),
    ),
    )); ?>
</div>