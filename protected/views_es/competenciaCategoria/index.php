<?php
$this->breadcrumbs=array(
	'Competencia Categorias',
);

$this->menu=array(
array('label'=>'Create CompetenciaCategoria','url'=>array('create')),
array('label'=>'Manage CompetenciaCategoria','url'=>array('admin')),
);
?>

<h1>Competencia Categorias</h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
