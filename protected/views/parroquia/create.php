<?php
$this->breadcrumbs=array(
	'Parish'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List parish','url'=>array('index')),
array('label'=>'Manage parish','url'=>array('admin')),
);
?>

<h1>Create parish</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>