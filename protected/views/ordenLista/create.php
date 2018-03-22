<?php
$this->breadcrumbs=array(
	'Orden Listas'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List OrdenLista','url'=>array('index')),
array('label'=>'Manage OrdenLista','url'=>array('admin')),
);
?>

<h1>Create OrdenLista</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>