<?php
$this->breadcrumbs=array(
	'Manifiestos',
);

$this->menu=array(
array('label'=>'Crear Manifiesto','url'=>array('create')),
array('label'=>'Administrar Manifiesto','url'=>array('admin')),
);
?>

<span  class="ez">Manifiesto</span>

<div class="pd-inner">
<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
</div>