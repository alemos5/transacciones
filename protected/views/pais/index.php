<?php
$this->breadcrumbs=array(
	'Paises',
);

$this->menu=array(
array('label'=>'Crear País','url'=>array('create')),
array('label'=>'Administrar País','url'=>array('admin')),
);
?>
<span  class="ez">Paises</span>

<div class="pd-inner">
    <?php $this->widget('booster.widgets.TbListView',array(
    'dataProvider'=>$dataProvider,
    'itemView'=>'_view',
    )); ?>
</div>