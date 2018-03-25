<?php
$this->breadcrumbs=array(
	'Tipo Productos',
);

$this->menu=array(
array('label'=>'Crear TipoProducto','url'=>array('create')),
array('label'=>'Administración de TipoProducto','url'=>array('admin')),
);
?>

<span  class="ez">Tipo Productos</span>

<div class="pd-inner">
    <?php $this->widget('booster.widgets.TbListView',array(
    'dataProvider'=>$dataProvider,
    'itemView'=>'_view',
    )); ?>
</div>