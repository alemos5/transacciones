<?php
$this->breadcrumbs=array(
	'Parish',
);

$this->menu=array(
array('label'=>'Create parish','url'=>array('create')),
array('label'=>'Manage parish','url'=>array('admin')),
);
?>

<h1>Parish</h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
