<?php
$this->breadcrumbs=array(
	'Cuenta Bancarias',
);

$this->menu=array(
array('label'=>'Crear CuentaBancaria','url'=>array('create')),
array('label'=>'Administración de CuentaBancaria','url'=>array('admin')),
);
?>

<span  class="ez">Cuenta Bancarias</span>

<div class="pd-inner">
    <?php $this->widget('booster.widgets.TbListView',array(
    'dataProvider'=>$dataProvider,
    'itemView'=>'_view',
    )); ?>
</div>