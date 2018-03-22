<?php
$this->breadcrumbs=array(
	'Facturas',
);

$this->menu=array(
array('label'=>'Create Factura','url'=>array('create')),
array('label'=>'Manage Factura','url'=>array('admin')),
);
?>

<h1>Facturas</h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
