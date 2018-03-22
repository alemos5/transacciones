<?php
$this->breadcrumbs=array(
	'Item Calificacions',
);

$this->menu=array(
array('label'=>'Create ItemCalificacion','url'=>array('create')),
array('label'=>'Manage ItemCalificacion','url'=>array('admin')),
);
?>

<h1>Item Calificacions</h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
