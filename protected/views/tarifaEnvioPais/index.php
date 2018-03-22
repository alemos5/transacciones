<?php
$this->breadcrumbs=array(
	'Tarifa Envio Paises',
);

$this->menu=array(
array('label'=>'Crear Tarifa de Envío a País','url'=>array('create')),
array('label'=>'Administrar Tarifa de Envío a Paises','url'=>array('admin')),
);
?>

<span  class="ez">Tarifa de Envío a Paises</span>
<div class="pd-inner">
<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
</div>
