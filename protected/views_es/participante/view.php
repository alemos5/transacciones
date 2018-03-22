<?php
$this->breadcrumbs=array(
	'Participantes'=>array('index'),
	$model->id_participante,
);

$this->menu=array(
array('label'=>'List Participante','url'=>array('index')),
array('label'=>'Create Participante','url'=>array('create')),
array('label'=>'Update Participante','url'=>array('update','id'=>$model->id_participante)),
array('label'=>'Delete Participante','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_participante),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage Participante','url'=>array('admin')),
);
?>

<h1>View Participante #<?php echo $model->id_participante; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id_participante',
		'id_inscripcion',
		'id_copetencia',
		'id_categoria',
		'id_usuario',
		'id_usuario_registro',
		'estatus',
),
)); ?>
