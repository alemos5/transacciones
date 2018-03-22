<?php
$this->breadcrumbs=array(
	'Tarifa Envio Paises'=>array('index'),
	$model->id_tarifa_envio_pais=>array('view','id'=>$model->id_tarifa_envio_pais),
	'Update',
);

	$this->menu=array(
	array('label'=>'Listar Tarifas de Envíos a Paises','url'=>array('index')),
	array('label'=>'Crear Tarifa de Envío a País','url'=>array('create')),
	array('label'=>'Detallar Tarifa de Envío a País','url'=>array('view','id'=>$model->id_tarifa_envio_pais)),
	array('label'=>'Administrar Tarifas de Envíos a Paises','url'=>array('admin')),
	);
	?>

<span  class="ez">Actualizar Tarifa de Envío a País</span>
<div class="pd-inner">
    <?php echo $this->renderPartial('_form',array('model'=>$model)); ?>
</div>
