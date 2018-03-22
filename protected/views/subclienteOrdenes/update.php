<?php
$this->breadcrumbs=array(
	'Subcliente Ordenes'=>array('index'),
	$model->id_subcliente_ordenes=>array('view','id'=>$model->id_subcliente_ordenes),
	'Update',
);

	$this->menu=array(
	array('label'=>'Listar Ordenes por Subclientes','url'=>array('index')),
	array('label'=>'Crear Ordenes por Subcliente','url'=>array('create')),
//	array('label'=>'Detallar Ordenes por Subcliente','url'=>array('view','id'=>$model->id_subcliente_ordenes)),
//	array('label'=>'Administrar Ordenes por Subclientes','url'=>array('admin')),
	);
	?>

	<span  class="ez">Actualizar Ordenes por subclientes</span>

<div class="pd-inner">
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>
</div>