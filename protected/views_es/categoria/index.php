<?php
$this->breadcrumbs=array(
	'Categorías',
);

$this->menu=array(
array('label'=>'Crear Categoría','url'=>array('create')),
array('label'=>'Administrar Categoría','url'=>array('admin')),
);
?>

<span class="ez">Categorías</span>

<div class="pd-inner">
<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
</div>