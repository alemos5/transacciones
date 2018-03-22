<?php
$this->breadcrumbs=array(
	'Juez Inscripcions',
);

$this->menu=array(
array('label'=>'Create JuezInscripcion','url'=>array('create')),
array('label'=>'Manage JuezInscripcion','url'=>array('admin')),
);
?>

<h1>Juez Inscripcions</h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
