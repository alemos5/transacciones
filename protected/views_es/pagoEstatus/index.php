<?php
$this->breadcrumbs=array(
	'Pago Estatuses',
);

$this->menu=array(
array('label'=>'Create PagoEstatus','url'=>array('create')),
array('label'=>'Manage PagoEstatus','url'=>array('admin')),
);
?>

<h1>Pago Estatuses</h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
