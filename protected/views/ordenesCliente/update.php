<?php
$this->breadcrumbs=array(
	'Ordenes Clientes'=>array('index'),
	$model->id_orden_cli=>array('view','id'=>$model->id_orden_cli),
	'Actualizar',
);

	$this->menu=array(
	array('label'=>'Listar Prealertas','url'=>array('index')),
	array('label'=>'Crear Prealerta','url'=>array('create')),
	array('label'=>'Detallar Prealerta','url'=>array('view','id'=>$model->id_orden_cli)),
	array('label'=>'Administrar Prealerta','url'=>array('admin')),
	);
	?>

	<span  class="ez">Actualizar Prealerta</span>

<div class="pd-inner">
    <?php echo $this->renderPartial('_form',array('model'=>$model)); ?>
</div>