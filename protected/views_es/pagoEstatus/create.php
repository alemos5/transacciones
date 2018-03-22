<?php
$this->breadcrumbs=array(
	'Pago Estatuses'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List PagoEstatus','url'=>array('index')),
array('label'=>'Manage PagoEstatus','url'=>array('admin')),
);
?>

<h1>Create PagoEstatus</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>