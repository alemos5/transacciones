<?php
$this->breadcrumbs=array(
	'Inscripción',
);

$this->menu=array(
//array('label'=>'Crear Inscripción','url'=>array('create')),
//array('label'=>'Administrar Inscripción','url'=>array('admin')),
);
?>

<span class="ez">Inscripciones</span>

<div class="pd-inner">
    <?php $this->widget('booster.widgets.TbListView',array(
    'dataProvider'=>$dataProvider,
    'itemView'=>'_view',
    )); ?>
</div>