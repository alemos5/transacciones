<?php
$this->breadcrumbs=array(
	'Tipos de Operaciones',
);

$this->menu=array(
array('label'=>'Crear Tipo de Operación','url'=>array('create')),
array('label'=>'Administrar Tipos de Operaciones','url'=>array('admin')),
);
?>

<span class="ez">Tipos de Operaciones</span>

<div class="pd-inner">
    <?php $this->widget('booster.widgets.TbListView',array(
    'dataProvider'=>$dataProvider,
    'itemView'=>'_view',
    )); ?>
</div>
