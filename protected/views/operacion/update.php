<?php
$this->breadcrumbs=array(
	'Operacions'=>array('index'),
	$model->id_operacion=>array('view','id'=>$model->id_operacion),
	'Actualizar',
);

	$this->menu=array(
	array('label'=>'Listar Operaciones','url'=>array('index')),
	array('label'=>'Crear Operación','url'=>array('create')),
	array('label'=>'Detallar Operación','url'=>array('view','id'=>$model->id_operacion)),
	array('label'=>'Administrar Operaciones','url'=>array('admin')),
	);
	?>

	<span class="ez">Actualizar Operación</span>

<div class="pd-inner">
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>
</div>