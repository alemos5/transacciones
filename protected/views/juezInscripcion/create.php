<?php
$this->breadcrumbs=array(
	'Juez Inscripcions'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List JuezInscripcion','url'=>array('index')),
array('label'=>'Manage JuezInscripcion','url'=>array('admin')),
);
?>

<h1>Create JuezInscripcion</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>