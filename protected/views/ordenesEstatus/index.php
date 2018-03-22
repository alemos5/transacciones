<?php
$this->breadcrumbs=array(
	'Ordenes Estatuses',
);

$this->menu=array(
array('label'=>'Create OrdenesEstatus','url'=>array('create')),
array('label'=>'Manage OrdenesEstatus','url'=>array('admin')),
);
?>

<h1>Ordenes Estatuses</h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
