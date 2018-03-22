<?php
$this->breadcrumbs=array(
	'Franquiciado Aprobacions',
);

$this->menu=array(
array('label'=>'Create FranquiciadoAprobacion','url'=>array('create')),
array('label'=>'Manage FranquiciadoAprobacion','url'=>array('admin')),
);
?>

<h1>Franquiciado Aprobacions</h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
