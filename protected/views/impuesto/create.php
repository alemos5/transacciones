<?php
$this->breadcrumbs=array(
	'Impuestos'=>array('index'),
	'Crear',
);

$this->menu=array(
array('label'=>'Listar gasto','url'=>array('index')),
array('label'=>'Administrar gasto','url'=>array('admin')),
);
?>

<h1>Crear gasto</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>