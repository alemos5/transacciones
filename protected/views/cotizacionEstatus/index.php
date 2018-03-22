<?php
$this->breadcrumbs=array(
	'Cotizacion Estatuses',
);

$this->menu=array(
array('label'=>'Create CotizacionEstatus','url'=>array('create')),
array('label'=>'Manage CotizacionEstatus','url'=>array('admin')),
);
?>

<h1>Cotizacion Estatuses</h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
