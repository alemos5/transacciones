<?php
$this->breadcrumbs=array(
	'Municipality'=>array('index'),
	$model->id_municipio=>array('view','id'=>$model->id_municipio),
	'Update',
);

	$this->menu=array(
	array('label'=>'List municipality','url'=>array('index')),
	array('label'=>'Create municipality','url'=>array('create')),
	array('label'=>'View municipality','url'=>array('view','id'=>$model->id_municipio)),
	array('label'=>'Manage municipality','url'=>array('admin')),
	);
	?>

	<h1>Update municipality <?php echo $model->id_municipio; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>