<?php
$this->breadcrumbs=array(
	'Competitor Pass'=>array('index'),
	$model->id_pase_competidor,
);

$this->menu=array(
array('label'=>'List Competitor Pass','url'=>array('index')),
array('label'=>'Create Competitor Pass','url'=>array('create')),
array('label'=>'Update Competitor Pass','url'=>array('update','id'=>$model->id_pase_competidor)),
array('label'=>'Delete Competitor Pass','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_pase_competidor),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage Competitor Pass','url'=>array('admin')),
);
?>

<h1>View Competitor Pass #<?php echo $model->id_pase_competidor; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id_pase_competidor',
		'fecha_pase',
		'valor',
		'id_competencia',
),
)); ?>
