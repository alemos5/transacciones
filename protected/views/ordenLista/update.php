<?php
$this->breadcrumbs=array(
	'Orden Listas'=>array('index'),
	$model->id_orden_lista=>array('view','id'=>$model->id_orden_lista),
	'Update',
);

	$this->menu=array(
	array('label'=>'List OrdenLista','url'=>array('index')),
	array('label'=>'Create OrdenLista','url'=>array('create')),
	array('label'=>'View OrdenLista','url'=>array('view','id'=>$model->id_orden_lista)),
	array('label'=>'Manage OrdenLista','url'=>array('admin')),
	);
	?>

	<h1>Update OrdenLista <?php echo $model->id_orden_lista; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>