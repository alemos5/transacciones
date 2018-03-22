<?php
$this->breadcrumbs=array(
	'Estatu Inscripcions'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List EstatuInscripcion','url'=>array('index')),
array('label'=>'Manage EstatuInscripcion','url'=>array('admin')),
);
?>

<h1>Create EstatuInscripcion</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>