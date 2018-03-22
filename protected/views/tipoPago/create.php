<?php
$this->breadcrumbs=array(
	'Payment Method'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List Payment Method','url'=>array('index')),
array('label'=>'Manage Payment Method','url'=>array('admin')),
);
?>

<h1>Create Payment Method</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>