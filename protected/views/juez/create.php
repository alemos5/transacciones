<?php
$this->breadcrumbs=array(
	'Juezs'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List Judge','url'=>array('index')),
);
?>

<span class="ez"><?php echo __('Create Judge'); ?></span>

<div class="pd-inner">
    <?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
</div>