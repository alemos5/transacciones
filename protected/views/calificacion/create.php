<?php
$this->breadcrumbs=array(
	'Calificacions'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List Qualification','url'=>array('index')),
array('label'=>'Manage Qualification','url'=>array('admin')),
);
?>
<span class="ez"><?php echo __('Create Qualification'); ?></span>

<div class="pd-inner">
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
</div>