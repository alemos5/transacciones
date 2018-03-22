<?php
$this->breadcrumbs=array(
	'Franquiciado Aprobacions'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List FranquiciadoAprobacion','url'=>array('index')),
array('label'=>'Manage FranquiciadoAprobacion','url'=>array('admin')),
);
?>

<h1>Create FranquiciadoAprobacion</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>