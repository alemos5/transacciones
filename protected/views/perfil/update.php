<?php
/* @var $this PerfilController */
/* @var $model Perfil */

$this->breadcrumbs=array(
	'Perfils'=>array('index'),
	$model->id_perfil_sistema=>array('view','id'=>$model->id_perfil_sistema),
	'Update',
);

$this->menu=array(
	array('label'=>__('List Perfil'), 'url'=>array('index')),
	array('label'=>__('Create Perfil'), 'url'=>array('create')),
	array('label'=>__('View Perfil'), 'url'=>array('view', 'id'=>$model->id_perfil_sistema)),
	array('label'=>__('Manage Perfil'), 'url'=>array('admin')),
);
?>

<span class="ez"><?php echo __('Update Perfil'); ?> <b>#<?php echo $model->id_perfil_sistema; ?></b></span>

<div class="pd-inner">
<?php $this->renderPartial('_form', array('model'=>$model)); ?></div>
