<?php
$this->breadcrumbs=array(
	'Ordenes'=>array('index'),
	$model->id_orden=>array('view','id'=>$model->id_orden),
	'Update',
);

	$this->menu=array(
	array('label'=>'Listar Ordenes','url'=>array('index')),
	array('label'=>'Crear Ordenes','url'=>array('create')),
	array('label'=>'Detallar Ordenes','url'=>array('view','id'=>$model->id_orden)),
	array('label'=>'Administrar Ordenes','url'=>array('admin')),
	);
	?>

	<span  class="ez">Actualizar Ordenes</span>

<div class="pd-inner">
    <?php echo $this->renderPartial('_form',array('model'=>$model)); ?>
</div>