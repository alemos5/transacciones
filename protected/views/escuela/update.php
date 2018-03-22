<?php
/* @var $this EscuelaController */
/* @var $model Escuela */

$this->breadcrumbs=array(
	'Escuelas'=>array('index'),
	$model->id_escuela=>array('view','id'=>$model->id_escuela),
	'Update',
);

$this->menu=array(
	array('label'=>__('List Escuela'), 'url'=>array('index')),
	array('label'=>__('Create Escuela'), 'url'=>array('create')),
	array('label'=>__('View Escuela'), 'url'=>array('view', 'id'=>$model->id_escuela)),
	array('label'=>__('Manage Escuela'), 'url'=>array('admin')),
);
?>

<span class="ez"><?php echo __('Update Escuela'); ?> <b>#<?php echo $model->id_escuela; ?></b></span>

<div class="pd-inner">
<?php $this->renderPartial('_form', array('model'=>$model)); ?></div>
