<?php
$this->breadcrumbs=array(
	'Servicios',
);

$this->menu=array(
array('label'=>'Crear Servicio','url'=>array('create')),
array('label'=>'Administrar Servicios','url'=>array('admin')),
);
?>

<span  class="ez">Servicios</span>

<div class="pd-inner">

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
</div>