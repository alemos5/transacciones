<?php
$this->breadcrumbs=array(
	'Clientes'=>array('index'),
	$model->id_cliente=>array('view','id'=>$model->id_cliente),
	'Update',
);

	$this->menu=array(
	array('label'=>'Listar Clientes','url'=>array('index')),
	array('label'=>'Crear Clientes','url'=>array('create')),
	array('label'=>'Detallar Clientes','url'=>array('view','id'=>$model->id_cliente)),
	array('label'=>'Administrar Clientes','url'=>array('admin')),
	);
	?>

	<span  class="ez">Actualizar Clientes</span>

<div class="pd-inner">
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>
</div>