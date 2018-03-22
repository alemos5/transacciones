<?php
$this->breadcrumbs=array(
	'Bloques',
);

$this->menu=array(
array('label'=>'Create Bloque','url'=>array('create')),
array('label'=>'Manage Bloque','url'=>array('admin')),
);
?>

<h1>Bloques</h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
