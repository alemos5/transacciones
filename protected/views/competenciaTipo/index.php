<?php
$this->breadcrumbs=array(
	'Competence Type',
);

$this->menu=array(
array('label'=>'Create  Competence Type','url'=>array('create')),
array('label'=>'Manage  Competence Type','url'=>array('admin')),
);
?>

<h1> Competence Types</h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
