<?php
$this->breadcrumbs=array(
	'Franquiciado Aprobacions'=>array('index'),
	$model->id_franquiciado_aprobacion,
);

$this->menu=array(
array('label'=>'List FranquiciadoAprobacion','url'=>array('index')),
array('label'=>'Create FranquiciadoAprobacion','url'=>array('create')),
array('label'=>'Update FranquiciadoAprobacion','url'=>array('update','id'=>$model->id_franquiciado_aprobacion)),
array('label'=>'Delete FranquiciadoAprobacion','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_franquiciado_aprobacion),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage FranquiciadoAprobacion','url'=>array('admin')),
);
?>

<h1>View FranquiciadoAprobacion #<?php echo $model->id_franquiciado_aprobacion; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id_franquiciado_aprobacion',
		'id_franquiciado_desembolso',
		'id_franquiciado',
		'fecha_aprobacion',
		'estatus',
),
)); ?>
