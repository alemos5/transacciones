<?php
$this->breadcrumbs=array(
	'Pase Competidors',
);

$this->menu=array(
array('label'=>'Create PaseCompetidor','url'=>array('create')),
array('label'=>'Manage PaseCompetidor','url'=>array('admin')),
);
?>

<h1>Pase Competidors</h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
