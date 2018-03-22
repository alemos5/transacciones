<?php
$this->breadcrumbs=array(
	'Item Qualification'=>array('index'),
	$model->id_item_calificacion,
);

$this->menu=array(
array('label'=>__('List Item Qualification'),'url'=>array('index')),
array('label'=>__('Create Item Qualification'),'url'=>array('create')),
array('label'=>__('Update Item Qualification'),'url'=>array('update','id'=>$model->id_item_calificacion)),
array('label'=>__('Delete Item Qualification'),'url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_item_calificacion),'confirm'=>__('Are you sure you want to delete this item?'))),
array('label'=>__('Manage Item Qualification'),'url'=>array('admin')),
);
?>


<span class="ez"><?php echo __('View Item Qualification'); ?> #<?php echo $model->id_item_calificacion; ?></span>

<div class="pd-inner">
<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id_item_calificacion',
		'item_calificacion',
		'estatus',
),
)); ?>
</div>