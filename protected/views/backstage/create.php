<?php
$this->breadcrumbs=array(
	'Backstages'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List Backstage','url'=>array('index')),
array('label'=>'Manage Backstage','url'=>array('admin')),
);
?>

<h1>Create Backstage</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>