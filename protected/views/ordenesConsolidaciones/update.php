<?php
$this->breadcrumbs=array(
	'Ordenes Consolidaciones'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

	$this->menu=array(
	array('label'=>'List OrdenesConsolidaciones','url'=>array('index')),
	array('label'=>'Create OrdenesConsolidaciones','url'=>array('create')),
	array('label'=>'View OrdenesConsolidaciones','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage OrdenesConsolidaciones','url'=>array('admin')),
	);
	?>

	<h1>Update OrdenesConsolidaciones <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>