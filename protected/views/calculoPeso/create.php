<?php
$this->breadcrumbs=array(
	'Calculo Pesos'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List CalculoPeso','url'=>array('index')),
array('label'=>'Manage CalculoPeso','url'=>array('admin')),
);
?>

<h1>Create CalculoPeso</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>