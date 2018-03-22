<?php
$this->breadcrumbs=array(
	'Juez Rondas',
);

$this->menu=array(
array('label'=>'Create JuezRonda','url'=>array('create')),
array('label'=>'Manage JuezRonda','url'=>array('admin')),
);
?>

<h1>Juez Rondas</h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
