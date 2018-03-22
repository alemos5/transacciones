<?php
$this->breadcrumbs=array(
	'Payment detail',
);

$this->menu=array(
array('label'=>'Create Payment detail','url'=>array('create')),
array('label'=>'Manage Payment detail','url'=>array('admin')),
);
?>

<h1>Payment detail</h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
