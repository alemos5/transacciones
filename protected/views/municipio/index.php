<?php
$this->breadcrumbs=array(
	'Municipality',
);

$this->menu=array(
array('label'=>'Create municipality','url'=>array('create')),
array('label'=>'Manage municipality','url'=>array('admin')),
);
?>

<h1>municipalities</h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
