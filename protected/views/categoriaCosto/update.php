<?php
$this->breadcrumbs=array(
	'Cost Category'=>array('index'),
	$model->id_categoria_costo=>array('view','id'=>$model->id_categoria_costo),
	'Update',
);

	$this->menu=array(
	array('label'=>'List Cost Category','url'=>array('index')),
	array('label'=>'Create Cost Category','url'=>array('create')),
	array('label'=>'View Cost Category','url'=>array('view','id'=>$model->id_categoria_costo)),
	array('label'=>'Manage Cost Category','url'=>array('admin')),
	);
	?>

	<h1>Update Cost Category <?php echo $model->id_categoria_costo; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>