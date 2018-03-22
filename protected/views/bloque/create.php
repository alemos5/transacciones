<?php
$this->breadcrumbs=array(
	'Blocks'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>__('Block List'),'url'=>array('index')),
array('label'=>__('Manage Block'),'url'=>array('admin')),
);
?>

<span class="ez"><?php echo __('Create Block'); ?></span>

    <div class="pd-inner">
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
    </div>
