<?php
$this->breadcrumbs=array(
	'Trakings'=>array('index'),
	$model->id_traking,
);

$this->menu=array(
array('label'=>'Listar Tracking','url'=>array('index')),
array('label'=>'Crear Tracking','url'=>array('create')),
array('label'=>'Actualizar Tracking','url'=>array('update','id'=>$model->id_traking)),
array('label'=>'Eliminar Tracking','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_traking),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Administrar Tracking','url'=>array('admin')),
);
?>

<span class="ez">Tracking</span>

<div class="pd-inner">
<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id_traking',
		'traking',
		'fecha',
//		'id_usuario',
),
)); ?>
</div>