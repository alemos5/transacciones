<?php
$this->breadcrumbs=array(
	'Cotizacion Detalles',
);

$this->menu=array(
array('label'=>'Create CotizacionDetalle','url'=>array('create')),
array('label'=>'Manage CotizacionDetalle','url'=>array('admin')),
);
?>

<h1>Cotizacion Detalles</h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
