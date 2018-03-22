<?php
$this->breadcrumbs=array(
	'Servicio Usuarios'=>array('index'),
	$model->id_servicio_usuario=>array('view','id'=>$model->id_servicio_usuario),
	'Update',
);

	$this->menu=array(
	array('label'=>'Listar Servicios especiales por Usuario','url'=>array('index')),
	array('label'=>'Crear Servicio especial por Usuario','url'=>array('create')),
	array('label'=>'Detallar Servicio especial por Usuario','url'=>array('view','id'=>$model->id_servicio_usuario)),
	array('label'=>'Administrar Servicios especiales por Usuario','url'=>array('admin')),
	);
	?>

	<span  class="ez">Actualizar servicio especial</span>

<div class="pd-inner">
<?php echo $this->renderPartial('_form',array('model'=>$model, 'servicioUsuarioItemsCount'=>$servicioUsuarioItemsCount)); ?>
</div>