<?php
$this->breadcrumbs=array(
	'Juez Inscripcions'=>array('index'),
	$model->id_juez_inscripcion,
);

$this->menu=array(
array('label'=>'List JuezInscripcion','url'=>array('index')),
array('label'=>'Create JuezInscripcion','url'=>array('create')),
array('label'=>'Update JuezInscripcion','url'=>array('update','id'=>$model->id_juez_inscripcion)),
array('label'=>'Delete JuezInscripcion','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_juez_inscripcion),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage JuezInscripcion','url'=>array('admin')),
);
?>

<h1>View JuezInscripcion #<?php echo $model->id_juez_inscripcion; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id_juez_inscripcion',
		'id_inscripcion',
		'id_juez',
),
)); ?>
