<?php
/* @var $this MenuController */
/* @var $model Menu */

$this->breadcrumbs=array(
	'Menus'=>array('index'),
	$model->id_menu_sistema=>array('view','id'=>$model->id_menu_sistema),
	'Update',
);

$this->menu=array(
	array('label'=>__('List Menu'), 'url'=>array('index')),
	array('label'=>__('Create Menu'), 'url'=>array('create')),
	array('label'=>__('View Menu'), 'url'=>array('view', 'id'=>$model->id_menu_sistema)),
	array('label'=>__('Manage Menu'), 'url'=>array('admin')),
);
?>

<span class="ez"><?php echo __('Update Menu'); ?> <b>#<?php echo $model->id_menu_sistema; ?></b></span>

<div class="pd-inner">
<?php $this->renderPartial('_form', array('model'=>$model)); ?></div>
