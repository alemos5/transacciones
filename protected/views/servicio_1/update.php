<?php
$this->breadcrumbs=array(
	'Servicios'=>array('index'),
	$model->id_servicio=>array('view','id'=>$model->id_servicio),
	'Actualizar',
);

	$this->menu=array(
	array('label'=>'Listar Servicios','url'=>array('index')),
	array('label'=>'Crear Servicio','url'=>array('create')),
	array('label'=>'Detallar Servicio','url'=>array('view','id'=>$model->id_servicio)),
	array('label'=>'Administrar Servicios','url'=>array('admin')),
	);
	?>

	<span  class="ez">Actualizar servicio</span>

<div class="pd-inner">
<?php echo $this->renderPartial('_form',array('model'=>$model, 'servicioImpuesto'=>$servicioImpuesto, 'servicioItemsCount'=>$servicioItemsCount)); ?>
</div>