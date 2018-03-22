<?php
$this->breadcrumbs=array(
	'Ciudades',
);

$this->menu=array(
array('label'=>'Create Ciudades','url'=>array('create')),
array('label'=>'Manage Ciudades','url'=>array('admin')),
);
?>

<h1>Ciudades</h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
