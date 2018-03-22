<?php
$this->breadcrumbs=array(
	'Calculo As'=>array('index'),
	$model->id_calculo_a=>array('view','id'=>$model->id_calculo_a),
	'Update',
);

	$this->menu=array(
	array('label'=>'List CalculoA','url'=>array('index')),
	array('label'=>'Create CalculoA','url'=>array('create')),
	array('label'=>'View CalculoA','url'=>array('view','id'=>$model->id_calculo_a)),
	array('label'=>'Manage CalculoA','url'=>array('admin')),
	);
	?>

	<h1>Update CalculoA <?php echo $model->id_calculo_a; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>