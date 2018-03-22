<?php
$this->breadcrumbs=array(
	'Tarifa Envio Paises'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'Listar Tarifas de Envíos a Paises','url'=>array('index')),
array('label'=>'Administrar Tarifas de Envíos a Paises','url'=>array('admin')),
);
?>

<span  class="ez">Crear Tarifa de Envío a Paises</span>
<div class="pd-inner">
    <?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
</div>
