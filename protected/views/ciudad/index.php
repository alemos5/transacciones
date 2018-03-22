<?php
$this->breadcrumbs=array(
	'City',
);

$this->menu=array(
array('label'=>'Create City','url'=>array('create')),
array('label'=>'Manage City','url'=>array('admin')),
);
?>

<h1>City</h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
