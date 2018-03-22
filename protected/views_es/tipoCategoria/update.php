<?php
$this->breadcrumbs=array(
	'Tipo Categorias'=>array('index'),
	$model->id_tipo_categoria=>array('view','id'=>$model->id_tipo_categoria),
	'Update',
);

	$this->menu=array(
	array('label'=>'List TipoCategoria','url'=>array('index')),
	array('label'=>'Create TipoCategoria','url'=>array('create')),
	array('label'=>'View TipoCategoria','url'=>array('view','id'=>$model->id_tipo_categoria)),
	array('label'=>'Manage TipoCategoria','url'=>array('admin')),
	);
	?>

	<h1>Update TipoCategoria <?php echo $model->id_tipo_categoria; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>