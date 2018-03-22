<?php
$this->breadcrumbs=array(
	'Tipo Cobros'=>array('index'),
	$model->id_tipo_cobro=>array('view','id'=>$model->id_tipo_cobro),
	'Actualizar',
);

	$this->menu=array(
	array('label'=>'Listar Tipos de Cobros','url'=>array('index')),
	array('label'=>'Crear Tipo de Cobro','url'=>array('create')),
	array('label'=>'Detallar Tipo de Cobro','url'=>array('view','id'=>$model->id_tipo_cobro)),
	array('label'=>'Administrar Tipos de Cobros','url'=>array('admin')),
	);
	?>

	<span  class="ez">Actualizar Tipos de Cobros</span>

<div class="pd-inner">
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>
</div>