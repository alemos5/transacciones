<?php
$this->breadcrumbs=array(
	'Competitor Pass',
);

$this->menu=array(
array('label'=>'Create Competitor Pass','url'=>array('create')),
array('label'=>'Manage Competitor Pass','url'=>array('admin')),
);
?>

<h1>Competitor Passes</h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
