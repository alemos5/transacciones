<?php
$this->breadcrumbs=array(
	'Franquiciados'=>array('index'),
	$model->id_franquiciado=>array('view','id'=>$model->id_franquiciado),
	'Update',
);

	$this->menu=array(
	array('label'=>'List Franquiciado','url'=>array('index')),
	array('label'=>'Create Franquiciado','url'=>array('create')),
	array('label'=>'View Franquiciado','url'=>array('view','id'=>$model->id_franquiciado)),
	array('label'=>'Manage Franquiciado','url'=>array('admin')),
	);
	?>

<span class="ez"><?php echo __('Update Franchisee'); ?></span>

<div class="pd-inner">
    <?php echo $this->renderPartial('_form',array('model'=>$model)); ?>
</div>