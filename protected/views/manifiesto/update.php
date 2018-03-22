<?php
$this->breadcrumbs=array(
	'Manifiestos'=>array('index'),
	$model->id_manifiesto=>array('view','id'=>$model->id_manifiesto),
	'Update',
);

	$this->menu=array(
	array('label'=>'Listar Manifiesto','url'=>array('index')),
	array('label'=>'Crear Manifiesto','url'=>array('create')),
	array('label'=>'Detallar Manifiesto','url'=>array('view','id'=>$model->id_manifiesto)),
	array('label'=>'Administrar Manifiesto','url'=>array('admin')),
	);
	?>

	<span  class="ez">Actualizar Manifiesto</span>

<div class="pd-inner">
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>
</div>