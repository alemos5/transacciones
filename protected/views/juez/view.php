<?php
$this->breadcrumbs=array(
	'Juezs'=>array('index'),
	$model->id_juez,
);

$this->menu=array(
array('label'=>'List Judge','url'=>array('index')),
array('label'=>'Create Judge','url'=>array('create')),
array('label'=>'Update Judge','url'=>array('update','id'=>$model->id_juez)),
);
?>

<span class="ez"><?php echo __('View Judge'); ?></span>

<div class="pd-inner">
<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id_juez',
		'id_usuario_sistema',
		'id_competencia',
		'fecha_registro',
		'estatus',
),
)); ?>
</div>
