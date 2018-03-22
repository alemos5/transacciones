<?php
$this->breadcrumbs=array(
	'Competencias',
);

$this->menu=array(
array('label'=>'Crear Competencia','url'=>array('create')),
array('label'=>'Administrar Competencia','url'=>array('admin')),
);
?>

<span class="ez">Competencias</span>

<div class="pd-inner">
    <?php $this->widget('booster.widgets.TbListView',array(
    'dataProvider'=>$dataProvider,
    'itemView'=>'_view',
    )); ?>
</div>