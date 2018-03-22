<?php
$this->breadcrumbs=array(
	'Competitor Pass'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List Competitor Pass','url'=>array('index')),
array('label'=>'Manage Competitor Pass','url'=>array('admin')),
);
?>

<h1>Create Competitor Pass</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>