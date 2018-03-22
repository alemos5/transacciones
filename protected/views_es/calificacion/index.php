<?php
$this->breadcrumbs=array(
	'Calificacions',
);

$this->menu=array(
array('label'=>'Create Calificacion','url'=>array('create')),
array('label'=>'Manage Calificacion','url'=>array('admin')),
);
?>

<h1>Calificacions</h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
