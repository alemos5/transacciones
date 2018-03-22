<?php
$this->breadcrumbs=array(
	'Ordenes',
);

$this->menu=array(
array('label'=>'Crear Ordenes','url'=>array('create')),
array('label'=>'Administrar Ordenes','url'=>array('admin')),
);
?>

<span  class="ez">Ordenes</span>

<div class="pd-inner">
<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
</div>