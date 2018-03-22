<?php
$this->breadcrumbs=array(
	'Juez Categorias',
);

$this->menu=array(
array('label'=>'Create JuezCategoria','url'=>array('create')),
array('label'=>'Manage JuezCategoria','url'=>array('admin')),
);
?>

<h1>Juez Categorias</h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
