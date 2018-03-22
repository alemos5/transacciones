<?php
$this->breadcrumbs=array(
	'Calculo Pesos',
);

$this->menu=array(
array('label'=>'Create CalculoPeso','url'=>array('create')),
array('label'=>'Manage CalculoPeso','url'=>array('admin')),
);
?>

<h1>Calculo Pesos</h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
