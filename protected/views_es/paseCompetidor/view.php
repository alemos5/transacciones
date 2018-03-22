<?php
$this->breadcrumbs=array(
	'Pase Competidors'=>array('index'),
	$model->id_pase_competidor,
);

$this->menu=array(
array('label'=>'List PaseCompetidor','url'=>array('index')),
array('label'=>'Create PaseCompetidor','url'=>array('create')),
array('label'=>'Update PaseCompetidor','url'=>array('update','id'=>$model->id_pase_competidor)),
array('label'=>'Delete PaseCompetidor','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_pase_competidor),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage PaseCompetidor','url'=>array('admin')),
);
?>

<h1>View PaseCompetidor #<?php echo $model->id_pase_competidor; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id_pase_competidor',
		'fecha_pase',
		'valor',
		'id_competencia',
),
)); ?>
