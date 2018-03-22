<?php
$this->breadcrumbs=array(
	'Estatu Inscripcions',
);

$this->menu=array(
array('label'=>'Create EstatuInscripcion','url'=>array('create')),
array('label'=>'Manage EstatuInscripcion','url'=>array('admin')),
);
?>

<h1>Estatu Inscripcions</h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
