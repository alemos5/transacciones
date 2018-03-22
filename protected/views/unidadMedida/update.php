<?php
$this->breadcrumbs=array(
	'Unidad Medidas'=>array('index'),
	$model->id_unidad_medida=>array('view','id'=>$model->id_unidad_medida),
	'Actualizar',
);

	$this->menu=array(
	array('label'=>'Listar Unidades de Medida','url'=>array('index')),
	array('label'=>'Crear Unidad de Medida','url'=>array('create')),
	array('label'=>'Detallar Unidad de Medida','url'=>array('view','id'=>$model->id_unidad_medida)),
	array('label'=>'Administrar Unidades de Medidas','url'=>array('admin')),
	);
	?>

	<span  class="ez">Actualizar Unidades de Medidas</span>

<div class="pd-inner">
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>
</div>