<?php
$this->breadcrumbs=array(
	'Unidad Medidas',
);

$this->menu=array(
array('label'=>'Crear Unidad de Medida','url'=>array('create')),
array('label'=>'Administrar Unidades de Medida','url'=>array('admin')),
);
?>

<span  class="ez">Unidades de Medidas</span>

<div class="pd-inner">
    <?php $this->widget('booster.widgets.TbListView',array(
    'dataProvider'=>$dataProvider,
    'itemView'=>'_view',
    )); ?>
</div>
