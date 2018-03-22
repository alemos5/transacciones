<?php
$this->breadcrumbs=array(
	'Manifiesto Ordenes Bulto Loadings'=>array('index'),
	$model->datos_extra=>array('view','id'=>$model->datos_extra),
	'Update',
);

	$this->menu=array(
	array('label'=>'List ManifiestoOrdenesBultoLoading','url'=>array('index')),
	array('label'=>'Create ManifiestoOrdenesBultoLoading','url'=>array('create')),
	array('label'=>'View ManifiestoOrdenesBultoLoading','url'=>array('view','id'=>$model->datos_extra)),
	array('label'=>'Manage ManifiestoOrdenesBultoLoading','url'=>array('admin')),
	);
	?>

	<h1>Update ManifiestoOrdenesBultoLoading <?php echo $model->datos_extra; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>