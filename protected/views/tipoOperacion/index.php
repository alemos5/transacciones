<?php
$this->breadcrumbs=array(
	'Resultados',
);

$this->menu=array(
array('label'=>'Crear Resultado','url'=>array('create')),
array('label'=>'Administrar Resultados','url'=>array('admin')),
);
?>

<span class="ez">Resultados</span>

<div class="pd-inner">
    <?php $this->widget('booster.widgets.TbListView',array(
    'dataProvider'=>$dataProvider,
    'itemView'=>'_view',
    )); ?>
</div>