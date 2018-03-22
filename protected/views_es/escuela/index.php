<?php
$this->breadcrumbs=array(
	'Escuelas',
);

$this->menu=array(
array('label'=>'Create Escuela','url'=>array('create')),
array('label'=>'Manage Escuela','url'=>array('admin')),
);
?>

<h1>Escuelas</h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
