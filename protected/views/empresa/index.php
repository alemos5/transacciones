<?php
$this->breadcrumbs=array(
	'Empresas',
);

$this->menu=array(
array('label'=>'Crear Empresa','url'=>array('create')),
array('label'=>'Administrar Empresas','url'=>array('admin')),
);
?>

<span  class="ez">Empresa</span>

<div class="pd-inner">
<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
</div>
