<?php
$this->breadcrumbs=array(
	'Payment Status'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List Payment Status','url'=>array('index')),
array('label'=>'Manage Payment Status','url'=>array('admin')),
);
?>

<h1>Create Payment Status</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>