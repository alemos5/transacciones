<?php
$this->breadcrumbs=array(
	'Juez Rondas'=>array('index'),
	$model->id_juez_ronda,
);

$this->menu=array(
array('label'=>'List JuezRonda','url'=>array('index')),
array('label'=>'Create JuezRonda','url'=>array('create')),
array('label'=>'Update JuezRonda','url'=>array('update','id'=>$model->id_juez_ronda)),
array('label'=>'Delete JuezRonda','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_juez_ronda),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage JuezRonda','url'=>array('admin')),
);
?>

<h1>View JuezRonda #<?php echo $model->id_juez_ronda; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id_juez_ronda',
		'id_juez',
		'id_ronda',
),
)); ?>
