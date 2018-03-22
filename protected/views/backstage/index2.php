<?php
$this->breadcrumbs=array(
	'Backstages',
);

$this->menu=array(
array('label'=>'Create Backstage','url'=>array('create')),
array('label'=>'Manage Backstage','url'=>array('admin')),
);
?>

<h1>Backstages</h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
