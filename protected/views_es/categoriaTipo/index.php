<?php
$this->breadcrumbs=array(
	'Categoria Tipos',
);

$this->menu=array(
array('label'=>'Create CategoriaTipo','url'=>array('create')),
array('label'=>'Manage CategoriaTipo','url'=>array('admin')),
);
?>

<h1>Categoria Tipos</h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
