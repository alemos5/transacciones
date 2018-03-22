<?php
$this->breadcrumbs=array(
	'Payment Status',
);

$this->menu=array(
array('label'=>'Create Payment Status','url'=>array('create')),
array('label'=>'Manage Payment Status','url'=>array('admin')),
);
?>

<h1>Payment Status</h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
