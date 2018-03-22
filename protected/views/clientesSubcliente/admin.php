<?php
$this->breadcrumbs=array(
	'Clientes Subclientes'=>array('index'),
	'Manage',
);

$this->menu=array(
array('label'=>'Administrar de Tracking','url'=>array('admin')),
array('label'=>'Tracking','url'=>array('tracking')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('clientes-subcliente-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<span class="ez">Administración de Subclientes</span>
<div class="pd-inner">

<?php $this->widget('booster.widgets.TbGridView',array(
'id'=>'clientes-subcliente-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
		'id_clientes_subcliente',
		'id_cliente',
		'code_cliente_padre',
		'code_cliente_hijo',
		'code_padre_hijo',
		'fecha_registro',
		/*
		'estatus',
		'descripcioon',
		*/
array(
'class'=>'booster.widgets.TbButtonColumn',
),
),
)); ?>
</div>