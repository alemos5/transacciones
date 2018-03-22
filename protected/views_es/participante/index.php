<?php
$this->breadcrumbs=array(
	'Participantes',
);

$this->menu=array(
array('label'=>'Create Participante','url'=>array('create')),
array('label'=>'Manage Participante','url'=>array('admin')),
);
?>

<h1>Participantes</h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
