<?php
$this->breadcrumbs=array(
	'Clientes Subclientes'=>array('index'),
	$model->id_clientes_subcliente=>array('view','id'=>$model->id_clientes_subcliente),
	'Actualizar',
);

	$this->menu=array(
	array('label'=>'Listar Subcliente','url'=>array('index')),
	array('label'=>'Crear Subcliente','url'=>array('create')),
	array('label'=>'Detallar Subcliente','url'=>array('view','id'=>$model->id_clientes_subcliente)),
	array('label'=>'Administrar Subcliente','url'=>array('admin')),
	);
	?>

	<span  class="ez">Actualizar Subcliente</span>

<div class="pd-inner">
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>
</div>