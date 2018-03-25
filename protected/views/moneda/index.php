<?php
$this->breadcrumbs=array(
	'Monedas',
);

$this->menu=array(
array('label'=>'Crear Moneda','url'=>array('create')),
array('label'=>'Administración de Moneda','url'=>array('admin')),
);
?>

<span  class="ez">Monedas</span>

<div class="pd-inner">
    <?php $this->widget('booster.widgets.TbListView',array(
    'dataProvider'=>$dataProvider,
    'itemView'=>'_view',
    )); ?>
</div>