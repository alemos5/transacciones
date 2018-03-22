<?php
$this->breadcrumbs=array(
	'Participants',
);

$this->menu=array(
array('label'=>'Create Participant','url'=>array('create')),
array('label'=>'Manage Participant','url'=>array('admin')),
);
?>

<h1>Participants</h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
