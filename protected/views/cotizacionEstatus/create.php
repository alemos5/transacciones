<?php
$this->breadcrumbs=array(
	'Cotizacion Estatuses'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List CotizacionEstatus','url'=>array('index')),
array('label'=>'Manage CotizacionEstatus','url'=>array('admin')),
);
?>

<h1>Create CotizacionEstatus</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>