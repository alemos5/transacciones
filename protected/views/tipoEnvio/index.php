<?php
$this->breadcrumbs=array(
	'Tipo Envios',
);

$this->menu=array(
array('label'=>'Crear Tipo Envío','url'=>array('create')),
array('label'=>'Administrar Tipos de Envío','url'=>array('admin')),
);
?>

<span  class="ez">Tipo de Envío</span>
<div class="pd-inner">
    <?php $this->widget('booster.widgets.TbListView',array(
    'dataProvider'=>$dataProvider,
    'itemView'=>'_view',
    )); ?>
</div>
