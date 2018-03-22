<?php
$this->breadcrumbs=array(
	'Estados',
);

$this->menu=array(
array('label'=>'Crear Estado','url'=>array('create')),
array('label'=>'Administrar Estado','url'=>array('admin')),
);
?>

<span class="ez">Estados</span>
<div class="pd-inner">
<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
</div>
