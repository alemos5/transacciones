<?php
$this->breadcrumbs=array(
	'Competencia Tipos',
);

$this->menu=array(
array('label'=>'Create CompetenciaTipo','url'=>array('create')),
array('label'=>'Manage CompetenciaTipo','url'=>array('admin')),
);
?>

<h1>Competencia Tipos</h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
