<?php
$this->breadcrumbs=array(
	'Blocks'=>array('index'),
	$model->id_bloque=>array('view','id'=>$model->id_bloque),
	'Update',
);

	$this->menu=array(
	array('label'=>__('Block List'),'url'=>array('index')),
	array('label'=>__('Create Block'),'url'=>array('create')),
	array('label'=>__('View Block'),'url'=>array('view','id'=>$model->id_bloque)),
	array('label'=>__('Manage Block'),'url'=>array('admin')),
	);
	?>

    <span class="ez"><?php echo __('Update Block'); ?> #<?php echo $model->id_bloque; ?></span>

    <div class="pd-inner">
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>
    </div>
