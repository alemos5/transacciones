<?php
$this->breadcrumbs=array(
	'Tarifa Productos',
);

$this->menu=array(
array('label'=>'Crear TarifaProducto','url'=>array('create')),
array('label'=>'Administración de TarifaProducto','url'=>array('admin')),
);
?>

<span  class="ez">Tarifa Productos</span>

<div class="pd-inner">
    <?php $this->widget('booster.widgets.TbListView',array(
    'dataProvider'=>$dataProvider,
    'itemView'=>'_view',
    )); ?>
</div>