<?php
$this->breadcrumbs=array(
	'Franquiciados'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>__('List Franquiciado'),'url'=>array('index')),
array('label'=>__('Manage Franquiciado'),'url'=>array('admin')),
);
?>

<span class="ez"><?php echo __('Create Franquiciado'); ?></span>

<div class="pd-inner">
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
</div>