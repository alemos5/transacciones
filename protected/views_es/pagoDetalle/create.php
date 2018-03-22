<?php
$this->breadcrumbs=array(
	'Pago Detalles'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List PagoDetalle','url'=>array('index')),
array('label'=>'Manage PagoDetalle','url'=>array('admin')),
);
?>

<h1>Create PagoDetalle</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>