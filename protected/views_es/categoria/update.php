<?php
$this->breadcrumbs=array(
	'Categorias'=>array('index'),
	$model->id_categoria=>array('view','id'=>$model->id_categoria),
	'Actualizar',
);

	$this->menu=array(
	array('label'=>'Listar Categorías','url'=>array('index')),
	array('label'=>'Crear Categoría','url'=>array('create')),
	array('label'=>'Detallar Categoría','url'=>array('view','id'=>$model->id_categoria)),
	array('label'=>'Administrar Categorías','url'=>array('admin')),
	);
	?>

	<span class="ez">Actualizar Categoría</span>

<div class="pd-inner">
<?php echo $this->renderPartial('_form',array('model'=>$model, 'categoriaItems'=>$categoriaItems, 'categoriaItemsCount'=>$categoriaItemsCount)); ?>
</div>