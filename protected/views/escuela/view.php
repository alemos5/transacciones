<?php
/* @var $this EscuelaController */
/* @var $model Escuela */

$this->breadcrumbs=array(
	'Escuelas'=>array('index'),
	$model->id_escuela,
);

$this->menu=array(
	array('label'=>__('List Escuela'), 'url'=>array('index')),
	array('label'=>__('Create Escuela'), 'url'=>array('create')),
	array('label'=>__('Update Escuela'), 'url'=>array('update', 'id'=>$model->id_escuela)),
	array('label'=>__('Delete Escuela'), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_escuela),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>__('Manage Escuela'), 'url'=>array('admin')),
);
?>

<span class="ez"><?php echo __('View Escuela'); ?> <b>#<?php echo $model->id_escuela; ?></b></span>

<div class="pd-inner">
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_escuela',
		'escuela',
		'estatus',
	),
)); ?>
</div>