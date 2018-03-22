<?php
$this->breadcrumbs=array(
	'Orden Listas',
);

$this->menu=array(
array('label'=>'Create OrdenLista','url'=>array('create')),
array('label'=>'Manage OrdenLista','url'=>array('admin')),
);
?>

<h1>Orden Listas</h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
