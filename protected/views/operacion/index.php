<?php
$this->breadcrumbs=array(
	'Operacions',
);

$this->menu=array(
array('label'=>'Crear Operacion','url'=>array('create')),
array('label'=>'Administración de Operacion','url'=>array('admin')),
);
?>

<span  class="ez">Operacions</span>

<div class="pd-inner">
    <?php $this->widget('booster.widgets.TbListView',array(
    'dataProvider'=>$dataProvider,
    'itemView'=>'_view',
    )); ?>
</div>