<?php
$this->breadcrumbs=array(
	'Consolidaciones'=>array('index'),
	$model->id_con=>array('view','id'=>$model->id_con),
	'Update',
);

	$this->menu=array(
	array('label'=>'Listar Consolidaciones','url'=>array('index')),
	array('label'=>'Crear Consolidaciones','url'=>array('create')),
	array('label'=>'Detalle Consolidaciones','url'=>array('view','id'=>$model->id_con)),
	array('label'=>'Administrar Consolidaciones','url'=>array('admin')),
	);
	?>

	<span  class="ez">Actualizar Consolidaciones</span>

<div class="pd-inner">
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>
</div>