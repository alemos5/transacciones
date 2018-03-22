<?php
$this->breadcrumbs=array(
	'Musicas',
);

$this->menu=array(
array('label'=>'Create Musica','url'=>array('create')),
array('label'=>'Manage Musica','url'=>array('admin')),
);
?>

<h1>Musicas</h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
