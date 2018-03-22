<?php
$this->breadcrumbs=array(
	'Participantes'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List Participante','url'=>array('index')),
array('label'=>'Manage Participante','url'=>array('admin')),
);
?>

<h1>Create Participante</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>