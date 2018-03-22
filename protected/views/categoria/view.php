<?php
$this->breadcrumbs=array(
	'Categories'=>array('index'),
	$model->id_categoria,
);

$this->menu=array(
array('label'=>__('List Categories'),'url'=>array('index')),
array('label'=>__('Create Category'),'url'=>array('create')),
array('label'=>__('Update Category'),'url'=>array('update','id'=>$model->id_categoria)),
array('label'=>__('Delete Category'),'url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_categoria),'confirm'=>__('Are you sure you want to delete this item?'))),
array('label'=>__('Manage Category'),'url'=>array('admin')),
);
?>


<span class="ez"><?php echo __('View Categoria'); ?> #<?php echo $model->id_categoria; ?></span>

<div class="pd-inner">
<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id_categoria',
		'categoria',
		'descripcion',
		'edad_min',
		'edad_max',
		'competidor_min',
		'competidor_max',
		'id_tipo_categoria',
		'id_bloque',
),
)); ?>
</div>