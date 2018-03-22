<?php
$this->breadcrumbs=array(
	'Tipos de Operacions'=>array('index'),
	$model->id_estatus_operacion=>array('view','id'=>$model->id_estatus_operacion),
	'Actualizar',
);

	$this->menu=array(
	array('label'=>'Listar Tipos de Operaciones','url'=>array('index')),
	array('label'=>'Crear Tipo de Operación','url'=>array('create')),
	array('label'=>'Detallar Tipo de Operación','url'=>array('view','id'=>$model->id_estatus_operacion)),
	array('label'=>'Administrar Tipos de Operaciones','url'=>array('admin')),
	);
	?>

	<span class="ez">Actualizar Tipo de operación</span>

<div class="pd-inner">
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>
</div>