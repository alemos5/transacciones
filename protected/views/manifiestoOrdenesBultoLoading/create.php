<?php
$this->breadcrumbs=array(
	'Manifiesto Ordenes Bulto Loadings'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List ManifiestoOrdenesBultoLoading','url'=>array('index')),
array('label'=>'Manage ManifiestoOrdenesBultoLoading','url'=>array('admin')),
);
?>

<h1>Create ManifiestoOrdenesBultoLoading</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>