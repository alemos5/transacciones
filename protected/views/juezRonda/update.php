<?php
$this->breadcrumbs=array(
	'Juez Rondas'=>array('index'),
	$model->id_juez_ronda=>array('view','id'=>$model->id_juez_ronda),
	'Update',
);

	$this->menu=array(
	array('label'=>'List JuezRonda','url'=>array('index')),
	array('label'=>'Create JuezRonda','url'=>array('create')),
	array('label'=>'View JuezRonda','url'=>array('view','id'=>$model->id_juez_ronda)),
	array('label'=>'Manage JuezRonda','url'=>array('admin')),
	);
	?>

	<h1>Update JuezRonda <?php echo $model->id_juez_ronda; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>