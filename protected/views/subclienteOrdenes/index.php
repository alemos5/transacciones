<?php
$this->breadcrumbs=array(
	'Subcliente Ordenes',
);

$this->menu=array(
array('label'=>'Crear Ordenes por Subclientes','url'=>array('create')),
array('label'=>'Administrar Ordenes por subclientes','url'=>array('admin')),
);
?>

<span  class="ez">Ordenes por subclientes</span>

<div class="pd-inner">
<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
</div>