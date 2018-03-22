<?php
$this->breadcrumbs=array(
	'Juez Item Calificacions',
);

$this->menu=array(
array('label'=>'Create JuezItemCalificacion','url'=>array('create')),
array('label'=>'Manage JuezItemCalificacion','url'=>array('admin')),
);
?>

<h1>Juez Item Calificacions</h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
