<?php
$this->breadcrumbs=array(
	'Cotizacions'=>array('index'),
	'Crear',
);

$this->menu=array(
array('label'=>'Listar Cotizaciones','url'=>array('index')),
array('label'=>'Administrar Cotizaciones','url'=>array('admin')),
);
?>

<span  class="ez">Crear una nueva cotización</span>

<div class="pd-inner">
    <?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
</div>