<?php
$this->breadcrumbs=array(
	'Reports'=>array('index'),
	$model->id_reporte=>array('view','id'=>$model->id_reporte),
	'Update',
);

	$this->menu=array(
	array('label'=>'List Report','url'=>array('index')),
	array('label'=>'Create Report','url'=>array('create')),
	array('label'=>'View Report','url'=>array('view','id'=>$model->id_reporte)),
	array('label'=>'Manage Report','url'=>array('admin')),
	);
	?>

	<h1>Update Report <?php echo $model->id_reporte; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>