<?php
$this->breadcrumbs=array(
	'Tipo Cobros',
);

$this->menu=array(
array('label'=>'Crear Tipo de Cobro','url'=>array('create')),
array('label'=>'Administrar Tipo de Cobro','url'=>array('admin')),
);
?>

<span  class="ez">Tipos de Cobro</span>

<div class="pd-inner">
<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
</div>
