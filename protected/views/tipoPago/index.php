<?php
$this->breadcrumbs=array(
	'Payment Method',
);

$this->menu=array(
array('label'=>'Create Payment Method','url'=>array('create')),
array('label'=>'Manage Payment Method','url'=>array('admin')),
);
?>

<h1>Payment Method</h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
