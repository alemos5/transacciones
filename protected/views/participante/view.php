<?php
$this->breadcrumbs=array(
	'Participants'=>array('index'),
	$model->id_participante,
);

$this->menu=array(
array('label'=>'List Participant','url'=>array('index')),
array('label'=>'Create Participant','url'=>array('create')),
array('label'=>'Update Participant','url'=>array('update','id'=>$model->id_participante)),
array('label'=>'Delete Participant','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_participante),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage Participant','url'=>array('admin')),
);
?>

<h1>View Participant #<?php echo $model->id_participante; ?></h1>

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
