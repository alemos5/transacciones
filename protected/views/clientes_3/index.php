<?php
$this->breadcrumbs=array(
	'Clientes',
);

$this->menu=array(
array('label'=>'Crear Clientes','url'=>array('create')),
array('label'=>'Administrar Clientes','url'=>array('admin')),
);
?>

<span  class="ez">Clientes</span>

<div class="pd-inner">
<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
</div>