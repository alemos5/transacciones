<?php
$this->breadcrumbs=array(
	'Item qualifications category'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List Item qualifications category','url'=>array('index')),
array('label'=>'Manage Item qualifications category','url'=>array('admin')),
);
?>

<h1>Create Item qualifications category</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>