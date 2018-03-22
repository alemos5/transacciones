<?php
$this->breadcrumbs=array(
	'Municipality'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List municipality','url'=>array('index')),
array('label'=>'Manage municipality','url'=>array('admin')),
);
?>

<h1>Create municipality</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>