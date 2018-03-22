<?php
$this->breadcrumbs=array(
	'Juez Item Calificacions'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List JuezItemCalificacion','url'=>array('index')),
array('label'=>'Manage JuezItemCalificacion','url'=>array('admin')),
);
?>

<h1>Create JuezItemCalificacion</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>