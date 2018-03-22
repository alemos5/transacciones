<?php
$this->breadcrumbs=array(
	'Payment detail'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List Payment detail','url'=>array('index')),
array('label'=>'Manage Payment detail','url'=>array('admin')),
);
?>

<h1>Create Payment detail</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>