<?php
$this->breadcrumbs=array(
	'Estatu Inscripcions'=>array('index'),
	$model->id_estatu_inscripcion,
);

$this->menu=array(
array('label'=>'List EstatuInscripcion','url'=>array('index')),
array('label'=>'Create EstatuInscripcion','url'=>array('create')),
array('label'=>'Update EstatuInscripcion','url'=>array('update','id'=>$model->id_estatu_inscripcion)),
array('label'=>'Delete EstatuInscripcion','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_estatu_inscripcion),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage EstatuInscripcion','url'=>array('admin')),
);
?>

<h1>View EstatuInscripcion #<?php echo $model->id_estatu_inscripcion; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id_estatu_inscripcion',
		'estatu_inscripcion',
		'estatus',
		'descripcion',
),
)); ?>
