<?php
$this->breadcrumbs=array(
	'Servicio por Usuarios',
);

$this->menu=array(
array('label'=>'Crear Servicio por Usuario','url'=>array('create')),
array('label'=>'Administrar Servicio por Usuario','url'=>array('admin')),
);
?>

<span  class="ez">Servicios Especiales por Usuario</span>

<div class="pd-inner">
<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
</div>