<?php
$this->breadcrumbs=array(
	'Categories'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>__('Categories List'),'url'=>array('index')),
array('label'=>__('Manage Categories'),'url'=>array('admin')),
);
?>


<span class="ez"><?php echo __('Create New Category'); ?></span>

<div class="pd-inner">
    <?php echo $this->renderPartial('_form', array('model'=>$model, 'categoriaItems'=>$categoriaItems)); ?>
</div>