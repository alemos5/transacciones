<?php
$this->breadcrumbs=array(
	'Impuestos'=>array('index'),
	$model->id_impuesto=>array('view','id'=>$model->id_impuesto),
	'Actualizar',
);

	$this->menu=array(
	array('label'=>'Listar gasto','url'=>array('index')),
	array('label'=>'Crear gasto','url'=>array('create')),
	array('label'=>'Detallar gasto','url'=>array('view','id'=>$model->id_impuesto)),
	array('label'=>'Administrar gasto','url'=>array('admin')),
	);
	?>

	<h1>Actualizar gasto <?php echo $model->id_impuesto; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>