<?php
$this->breadcrumbs=array(
	'Franquiciado Desembolsos'=>array('index'),
	$model->id_franquiciado_desembolso=>array('view','id'=>$model->id_franquiciado_desembolso),
	'Update',
);

	$this->menu=array(
	array('label'=>'Listar Desembolso Franquiciado','url'=>array('index')),
	array('label'=>'Crear Desembolso Franquiciado','url'=>array('create')),
	array('label'=>'Detallar Desembolso Franquiciado','url'=>array('view','id'=>$model->id_franquiciado_desembolso)),
	array('label'=>'Administrar Desembolso Franquiciado','url'=>array('admin')),
	);
	?>

	<span class="ez">Actualizar Desembolsos Franquiciado </span>
<div class="pd-inner">
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>
</div>