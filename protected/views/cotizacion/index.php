<?php
$this->breadcrumbs=array(
	'Cotizaciones',
);

$this->menu=array(
array('label'=>'Crear Cotización','url'=>array('create')),
array('label'=>'Administrar Cotizaciones','url'=>array('admin')),
);
?>

<span  class="ez">Cotizaciones</span>

<div class="pd-inner">
    <?php $this->widget('booster.widgets.TbListView',array(
    'dataProvider'=>$dataProvider,
    'itemView'=>'_view',
    )); ?>
</div>