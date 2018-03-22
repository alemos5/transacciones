<?php
$this->breadcrumbs=array(
	'Categories'=>array('index'),
	$model->id_categoria=>array('view','id'=>$model->id_categoria),
	'Update',
);

	$this->menu=array(
	array('label'=>__('Category List'),'url'=>array('index')),
	array('label'=>__('Create Category'),'url'=>array('create')),
	array('label'=>__('Category Details'),'url'=>array('view','id'=>$model->id_categoria)),
	array('label'=>__('Manage Categories'),'url'=>array('admin')),
	);
	?>

	<span class="ez"><?php echo __('Update Categories'); ?></span>

<div class="pd-inner">
<?php echo $this->renderPartial('_form',array('model'=>$model, 'categoriaItems'=>$categoriaItems, 'categoriaItemsCount'=>$categoriaItemsCount)); ?>
</div>