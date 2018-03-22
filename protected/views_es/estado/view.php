<?php
$this->breadcrumbs=array(
	'Estados'=>array('index'),
	$model->id_estado,
);

$this->menu=array(
array('label'=>'Listar Estado','url'=>array('index')),
array('label'=>'Crear Estado','url'=>array('create')),
array('label'=>'Actualizar Estado','url'=>array('update','id'=>$model->id_estado)),
array('label'=>'Eliminar Estado','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_estado),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Administrar Estado','url'=>array('admin')),
);
?>

<span class="ez">Ver Estado #<?php echo $model->id_estado; ?></span>
<div class="pd-inner">
<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id_estado',
		'nombre',
		'estatus',
),
)); ?>
</div>