<?php
$this->breadcrumbs=array(
	'Item Qualification'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>__('List Item Qualification'),'url'=>array('index')),
array('label'=>__('Manage Item Qualification'),'url'=>array('admin')),
);
?>


    <span class="ez"><?php echo __('Create Item Qualification'); ?></span>

    <div class="pd-inner">
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
    </div>
