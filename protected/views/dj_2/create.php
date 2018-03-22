<?php
$this->breadcrumbs=array(
	'Djs'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List Dj','url'=>array('index')),
array('label'=>'Manage Dj','url'=>array('admin')),
);
?>

<h1>Create Dj</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>