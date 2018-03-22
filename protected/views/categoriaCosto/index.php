<?php
$this->breadcrumbs=array(
	'Cost Category',
);

$this->menu=array(
array('label'=>'Create Cost Category','url'=>array('create')),
array('label'=>'Manage Cost Category','url'=>array('admin')),
);
?>

<h1>Cost Category</h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
