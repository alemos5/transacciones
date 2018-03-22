<?php
$this->breadcrumbs=array(
	'Item Qualification'=>array('index'),
	$model->id_item_calificacion=>array('view','id'=>$model->id_item_calificacion),
	'Update',
);

	$this->menu=array(
	array('label'=>__('List Item Qualification'),'url'=>array('index')),
	array('label'=>__('Create Item Qualification'),'url'=>array('create')),
	array('label'=>__('View Item Qualification'),'url'=>array('view','id'=>$model->id_item_calificacion)),
	array('label'=>__('Manage Item Qualification'),'url'=>array('admin')),
	);
	?>


    <span class="ez"><?php echo __('Update Item Qualification'); ?> #<?php echo $model->id_item_calificacion; ?></span>

    <div class="pd-inner">
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>
    </div>
