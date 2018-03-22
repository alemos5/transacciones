<?php
$this->breadcrumbs=array(
	'gasto',
);

$this->menu=array(
array('label'=>'Crear gasto','url'=>array('create')),
array('label'=>'Administrar gasto','url'=>array('admin')),
);
?>

<h1>Gastos</h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
