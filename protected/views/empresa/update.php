<?php
$this->breadcrumbs=array(
	'Empresas'=>array('index'),
	$model->id_empresa=>array('view','id'=>$model->id_empresa),
	'Actualizar',
);

	$this->menu=array(
	array('label'=>'Listar Empresas','url'=>array('index')),
	array('label'=>'Crear Empresas','url'=>array('create')),
	array('label'=>'Detallar Empresas','url'=>array('view','id'=>$model->id_empresa)),
	array('label'=>'Administrar Empresas','url'=>array('admin')),
	);
	?>

	<span  class="ez">Actualizar empresa</span>

<div class="pd-inner">
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>
</div>