<?php
$this->breadcrumbs=array(
	'Servicios'=>array('index'),
	'Crear',
);

$this->menu=array(
array('label'=>'Listar Servicios','url'=>array('index')),
array('label'=>'Administrar Servicios','url'=>array('admin')),
);
?>
<span  class="ez">Crear un nuevo servicio</span>

<div class="pd-inner">
    <?php echo $this->renderPartial('_form', array('model'=>$model, 'servicioImpuesto'=>$servicioImpuesto)); ?>
</div>