<?php
$this->breadcrumbs=array(
	'Trakings',
);

$this->menu=array(
array('label'=>'Creatr Tracking','url'=>array('create')),
array('label'=>'Administrar Tracking','url'=>array('admin')),
);
?>


<span class="ez">Alamacen Tracking</span>

<div class="pd-inner">
<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
</div>