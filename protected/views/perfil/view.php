<?php
/* @var $this PerfilController */
/* @var $model Perfil */

$this->breadcrumbs=array(
	'Perfils'=>array('index'),
	$model->id_perfil_sistema,
);

$this->menu=array(
	array('label'=>__('List Perfil'), 'url'=>array('index')),
	array('label'=>__('Create Perfil'), 'url'=>array('create')),
	array('label'=>__('Update Perfil'), 'url'=>array('update', 'id'=>$model->id_perfil_sistema)),
	array('label'=>__('Delete Perfil'), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_perfil_sistema),'confirm'=>__('Are you sure you want to delete this item?'))),
	array('label'=>__('Manage Perfil'), 'url'=>array('admin')),
);
?>

<span class="ez"><?php echo __('View Perfil'); ?> <b>#<?php echo $model->id_perfil_sistema; ?></b></span>

<div class="pd-inner">
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_perfil_sistema',
		'nombre',
		'estatus',
	),
)); ?>
</div>