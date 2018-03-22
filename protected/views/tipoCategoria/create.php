<?php
$this->breadcrumbs=array(
	'Category Type'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List Category Type','url'=>array('index')),
array('label'=>'Manage Category Type','url'=>array('admin')),
);
?>

<h1>Create Category Type</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>