<?php
$this->breadcrumbs=array(
	'Calculo As',
);

$this->menu=array(
array('label'=>'Create CalculoA','url'=>array('create')),
array('label'=>'Manage CalculoA','url'=>array('admin')),
);
?>

<h1>Calculo As</h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
