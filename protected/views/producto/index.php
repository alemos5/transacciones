<?php
$this->breadcrumbs=array(
	'Productos',
);

$this->menu=array(
array('label'=>'Crear Producto','url'=>array('create')),
array('label'=>'Administración de Producto','url'=>array('admin')),
);
?>

<span  class="ez">Productos</span>

<div class="pd-inner">
    <?php $this->widget('booster.widgets.TbListView',array(
    'dataProvider'=>$dataProvider,
    'itemView'=>'_view',
    )); ?>
</div>