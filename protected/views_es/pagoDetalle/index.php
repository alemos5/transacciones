<?php
$this->breadcrumbs=array(
	'Pago Detalles',
);

$this->menu=array(
array('label'=>'Create PagoDetalle','url'=>array('create')),
array('label'=>'Manage PagoDetalle','url'=>array('admin')),
);
?>

<h1>Pago Detalles</h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
