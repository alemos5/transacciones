<?php
$this->breadcrumbs=array(
	'Cost Categorys'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List Cost Category','url'=>array('index')),
array('label'=>'Manage Cost Category','url'=>array('admin')),
);
?>

<h1>Create Cost Category</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>