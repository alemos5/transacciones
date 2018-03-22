<?php
$this->breadcrumbs=array(
	'Juez Categorias'=>array('index'),
	$model->id_juez_categoria=>array('view','id'=>$model->id_juez_categoria),
	'Update',
);

	$this->menu=array(
	array('label'=>'List JuezCategoria','url'=>array('index')),
	array('label'=>'Create JuezCategoria','url'=>array('create')),
	array('label'=>'View JuezCategoria','url'=>array('view','id'=>$model->id_juez_categoria)),
	array('label'=>'Manage JuezCategoria','url'=>array('admin')),
	);
	?>

	<h1>Update JuezCategoria <?php echo $model->id_juez_categoria; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>