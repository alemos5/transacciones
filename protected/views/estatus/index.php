<?php
$this->breadcrumbs=array(
	'Estatuses',
);

$this->menu=array(
array('label'=>'Crear Estatus','url'=>array('create')),
array('label'=>'Administración de Estatus','url'=>array('admin')),
);
?>

<span  class="ez">Estatuses</span>

<div class="pd-inner">
    <?php $this->widget('booster.widgets.TbListView',array(
    'dataProvider'=>$dataProvider,
    'itemView'=>'_view',
    )); ?>
</div>