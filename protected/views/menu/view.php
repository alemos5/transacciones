<?php
/* @var $this MenuController */
/* @var $model Menu */

$this->breadcrumbs=array(
	'Menus'=>array('index'),
	$model->id_menu_sistema,
);

$this->menu=array(
	array('label'=>__('List Menu'), 'url'=>array('index')),
	array('label'=>__('Create Menu'), 'url'=>array('create')),
	array('label'=>__('Update Menu'), 'url'=>array('update', 'id'=>$model->id_menu_sistema)),
	array('label'=>__('Delete Menu'), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_menu_sistema),'confirm'=>__('Are you sure you want to delete this item?'))),
	array('label'=>__('Manage Menu'), 'url'=>array('admin')),
);
?>

<span class="ez"><?php echo __('View Menu'); ?> <b>#<?php echo $model->id_menu_sistema; ?></b></span>

<div class="pd-inner">
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_menu_sistema',
		'nombre',
		'ruta',
		'padre',
		'nivel',
		'style',
		'estatus',
	),
)); ?>
</div>