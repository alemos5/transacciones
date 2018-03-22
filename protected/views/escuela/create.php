<?php
/* @var $this EscuelaController */
/* @var $model Escuela */

$this->breadcrumbs=array(
	'Escuelas'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>__('List Escuela'), 'url'=>array('index')),
	array('label'=>__('Manage Escuela'), 'url'=>array('admin')),
);
?>

<span class="ez"><?php echo __('Create Escuela'); ?></span>

<div class="pd-inner">
<?php $this->renderPartial('_form', array('model'=>$model)); ?></div>