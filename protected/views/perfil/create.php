<?php
/* @var $this PerfilController */
/* @var $model Perfil */

$this->breadcrumbs=array(
	'Perfils'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>__('List Perfil'), 'url'=>array('index')),
	array('label'=>__('Manage Perfil'), 'url'=>array('admin')),
);
?>

<span class="ez"><?php echo __('Create Perfil'); ?></span>

<div class="pd-inner">
<?php $this->renderPartial('_form', array('model'=>$model)); ?></div>