<?php
$this->breadcrumbs=array(
	'Ordenes Consolidaciones',
);

$this->menu=array(
array('label'=>'Create OrdenesConsolidaciones','url'=>array('create')),
array('label'=>'Manage OrdenesConsolidaciones','url'=>array('admin')),
);
?>

<h1>Ordenes Consolidaciones</h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
