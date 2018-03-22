<?php
$this->breadcrumbs=array(
	'Acreditados'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List Acreditado','url'=>array('index')),
array('label'=>'Manage Acreditado','url'=>array('admin')),
);
?>

<h1>Create Acreditado</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>