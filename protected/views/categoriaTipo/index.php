<?php
$this->breadcrumbs=array(
	'Category Types',
);

$this->menu=array(
array('label'=>'Create Category Type','url'=>array('create')),
array('label'=>'Manage Category Type','url'=>array('admin')),
);
?>

<h1>Category Type</h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
