<?php
$this->breadcrumbs=array(
	'Calificacions'=>array('index'),
	'Manage',
);

$this->menu=array(
array('label'=>'List Qualification','url'=>array('index')),
array('label'=>'Create Qualification','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('calificacion-grid', {
data: $(this).serialize()
});
return false;
});
");
?>


<span class="ez"><?php echo __('Manage Qualification'); ?></span>

<div class="pd-inner">
<?php $this->widget('booster.widgets.TbGridView',array(
'id'=>'calificacion-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
		'id_calificacion',
		'id_categoria_item_calificacion',
		'rango_max',
		'rango_min',
		'id_juez',
		'id_inscripcion',
		/*
		'fecha_registro',
		*/
array(
'class'=>'booster.widgets.TbButtonColumn',
),
),
)); ?>
</div>