<?php
$this->breadcrumbs=array(
	'Subscription status',
);

$this->menu=array(
array('label'=>'Create  Subscription Status','url'=>array('create')),
array('label'=>'Manage  Subscription Status','url'=>array('admin')),
);
?>

<h1>Subscription Status</h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
