<?php
$this->breadcrumbs=array(
	'Cotizacions'=>array('index'),
	$model->id_cotizacion=>array('view','id'=>$model->id_cotizacion),
	'Actualizar',
);

	$this->menu=array(
	array('label'=>'Listar Cotizaciones','url'=>array('index')),
	array('label'=>'Crear Cotización','url'=>array('create')),
	array('label'=>'Detallar Cotización','url'=>array('view','id'=>$model->id_cotizacion)),
	array('label'=>'Administrar Cotización','url'=>array('admin')),
	);
	?>
<span  class="ez">Actualizar cotización</span>

<div class="pd-inner">
    <?php echo $this->renderPartial('_form',array('model'=>$model, 'cotizacionDetalle'=>$cotizacionDetalle, 'cotizacionForm'=>$cotizacionForm)); ?>
</div>