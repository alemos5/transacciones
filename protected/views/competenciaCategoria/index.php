<?php
$this->breadcrumbs=array(
	'Competence Category',
);

$this->menu=array(
array('label'=>'Create  Competence Category','url'=>array('create')),
array('label'=>'Manage  Competence Category','url'=>array('admin')),
);
?>

<h1> Competence Category</h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
