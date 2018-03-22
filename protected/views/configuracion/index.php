<?php
$this->breadcrumbs=array(
	'Configuracions',
);

$this->menu=array(
array('label'=>'Create Configuracion','url'=>array('create')),
array('label'=>'Manage Configuracion','url'=>array('admin')),
);
?>

<h1>Configuracions</h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
