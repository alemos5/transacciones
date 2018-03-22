<?php
$this->breadcrumbs=array(
	'Tipo Operacions'=>array('index'),
	$model->id_tipo_operacion=>array('view','id'=>$model->id_tipo_operacion),
	'Actualizar',
);

	$this->menu=array(
	array('label'=>'Listar Resultados','url'=>array('index')),
	array('label'=>'Crear Resultados','url'=>array('create')),
	array('label'=>'Detallar Resultado','url'=>array('view','id'=>$model->id_tipo_operacion)),
	array('label'=>'Administrar Resultados','url'=>array('admin')),
	);
	?>

	<span class="ez">Actualizar Resultado</span>

<div class="pd-inner">
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>
</div>