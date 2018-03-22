<?php
$this->breadcrumbs=array(
	'Trakings'=>array('index'),
	$model->id_traking=>array('view','id'=>$model->id_traking),
	'Update',
);

	$this->menu=array(
	array('label'=>'Listar Tracking','url'=>array('index')),
	array('label'=>'Crear Tracking','url'=>array('create')),
	array('label'=>'Detallar Tracking','url'=>array('view','id'=>$model->id_traking)),
	array('label'=>'Administrar Tracking','url'=>array('admin')),
	);
	?>

	<span class="ez">Actualizar Tracking</span>

<div class="pd-inner">
    <?php echo $this->renderPartial('_form',array('model'=>$model)); ?>
</div>