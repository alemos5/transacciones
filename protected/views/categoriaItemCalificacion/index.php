<?php
$this->breadcrumbs=array(
	'Item qualifications category',
);

$this->menu=array(
array('label'=>'Create Item qualifications category','url'=>array('create')),
array('label'=>'Manage Item qualifications category','url'=>array('admin')),
);
?>

<h1>Item qualifications category</h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
