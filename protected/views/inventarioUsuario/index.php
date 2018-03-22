<?php
$this->breadcrumbs=array(
	'Inventario Usuarios',
);

$this->menu=array(
array('label'=>'Crear Inventario a Usuario','url'=>array('create')),
array('label'=>'Administrar Inventario a Usuario','url'=>array('admin')),
);
?>

<span  class="ez">Inventario por Usuario</span>

<div class="pd-inner">
<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
</div>