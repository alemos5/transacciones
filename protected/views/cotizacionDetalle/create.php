<?php
$this->breadcrumbs=array(
	'Cotizacion Detalles'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List CotizacionDetalle','url'=>array('index')),
array('label'=>'Manage CotizacionDetalle','url'=>array('admin')),
);
?>

<h1>Create CotizacionDetalle</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>