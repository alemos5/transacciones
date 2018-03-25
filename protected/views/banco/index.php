<?php
$this->breadcrumbs=array(
	'Bancos',
);

$this->menu=array(
array('label'=>'Crear Banco','url'=>array('create')),
array('label'=>'Administración de Banco','url'=>array('admin')),
);
?>

<span  class="ez">Bancos</span>

<div class="pd-inner">
    <?php $this->widget('booster.widgets.TbListView',array(
    'dataProvider'=>$dataProvider,
    'itemView'=>'_view',
    )); ?>
</div>