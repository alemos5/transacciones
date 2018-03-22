<?php
$this->breadcrumbs=array(
	'Calculo Pesos'=>array('index'),
	$model->id_calculo_peso=>array('view','id'=>$model->id_calculo_peso),
	'Update',
);

	$this->menu=array(
	array('label'=>'List CalculoPeso','url'=>array('index')),
	array('label'=>'Create CalculoPeso','url'=>array('create')),
	array('label'=>'View CalculoPeso','url'=>array('view','id'=>$model->id_calculo_peso)),
	array('label'=>'Manage CalculoPeso','url'=>array('admin')),
	);
	?>

	<h1>Update CalculoPeso <?php echo $model->id_calculo_peso; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>