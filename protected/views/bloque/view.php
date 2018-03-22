<?php
$this->breadcrumbs=array(
	'Blocks'=>array('index'),
	$model->id_bloque,
);

$this->menu=array(
array('label'=>__('Block List'),'url'=>array('index')),
array('label'=>__('Create Block'),'url'=>array('create')),
array('label'=>__('Update Block'),'url'=>array('update','id'=>$model->id_bloque)),
array('label'=>__('Delete Block'),'url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_bloque),'confirm'=>__('Are you sure you want to delete this item?'))),
array('label'=>__('Manage Block'),'url'=>array('admin')),
);					   
?>

<span class="ez"><?php echo __('View Block'); ?> #<?php echo $model->id_bloque; ?></span>

<div class="pd-inner">
<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id_bloque',
		'bloque',
		'estatus',
),
)); ?>
</div>