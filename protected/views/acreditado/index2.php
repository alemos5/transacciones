<?php
$this->breadcrumbs=array(
	'Acreditados',
);

$this->menu=array(
array('label'=>'Create Acreditado','url'=>array('create')),
array('label'=>'Manage Acreditado','url'=>array('admin')),
);
?>

<h1>Acreditados</h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
