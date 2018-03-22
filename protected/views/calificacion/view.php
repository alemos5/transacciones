<?php
$this->breadcrumbs=array(
	'Calificacions'=>array('index'),
	$model->id_calificacion,
);

$this->menu=array(
array('label'=>'List Qualification','url'=>array('index')),
array('label'=>'Create Qualification','url'=>array('create')),
array('label'=>'Update Qualification','url'=>array('update','id'=>$model->id_calificacion)),
array('label'=>'Delete Qualification','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_calificacion),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage Qualification','url'=>array('admin')),
);
?>

<span class="ez"><?php echo __('Detail Qualification'); ?></span>

<div class="pd-inner">
<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id_calificacion',
		'id_categoria_item_calificacion',
		'rango_max',
		'rango_min',
		'id_juez',
		'id_inscripcion',
		'fecha_registro',
),
)); ?>
</div>