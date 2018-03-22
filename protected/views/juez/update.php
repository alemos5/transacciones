<?php
$this->breadcrumbs=array(
	'Juezs'=>array('index'),
	$model->id_juez=>array('view','id'=>$model->id_juez),
	'Update',
);

	$this->menu=array(
	array('label'=>'List Judge','url'=>array('index')),
	array('label'=>'Create Judge','url'=>array('create')),
	array('label'=>'View Judge','url'=>array('view','id'=>$model->id_juez)),
	);
	?>

	<span class="ez"><?php echo __('Update Judge'); ?></span>

<div class="pd-inner">
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>
</div>