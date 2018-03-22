<?php
$this->breadcrumbs=array(
	'Calculo As'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List CalculoA','url'=>array('index')),
array('label'=>'Manage CalculoA','url'=>array('admin')),
);
?>

<h1>Create CalculoA</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>