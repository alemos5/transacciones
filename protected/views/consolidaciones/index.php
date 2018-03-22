<?php
$this->breadcrumbs=array(
	'Consolidaciones',
);

$this->menu=array(
array('label'=>'Crear Consolidaciones','url'=>array('create')),
array('label'=>'Administrar Consolidaciones','url'=>array('admin')),
);
?>

<span  class="ez">Consolidaciones</span>

<div class="pd-inner">
<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
</div>
