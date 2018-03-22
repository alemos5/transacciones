<?php
/* @var $this MenuController */
/* @var $model Menu */

$this->breadcrumbs=array(
	'Menus'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>__('List Menu'), 'url'=>array('index')),
	array('label'=>__('Manage Menu'), 'url'=>array('admin')),
);
?>

<span class="ez"><?php echo __('Create Menu'); ?></span>

<div class="pd-inner">
<?php $this->renderPartial('_form', array('model'=>$model)); ?></div>