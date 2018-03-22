<?php
$this->breadcrumbs=array(
	'Calificacions'=>array('index'),
	$model->id_calificacion=>array('view','id'=>$model->id_calificacion),
	'Update',
);

	$this->menu=array(
	array('label'=>'List Qualification','url'=>array('index')),
	array('label'=>'Create Qualification','url'=>array('create')),
	array('label'=>'View Qualification','url'=>array('view','id'=>$model->id_calificacion)),
	array('label'=>'Manage Qualification','url'=>array('admin')),
	);
	?>

	<span class="ez"><?php echo __('Update Qualification'); ?></span>

<div class="pd-inner">
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>
</div>