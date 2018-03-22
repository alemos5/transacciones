<?php
$this->breadcrumbs=array(
	'Manifiesto Ordenes Bulto Loadings'=>array('index'),
	$model->datos_extra,
);

$this->menu=array(
array('label'=>'List ManifiestoOrdenesBultoLoading','url'=>array('index')),
array('label'=>'Create ManifiestoOrdenesBultoLoading','url'=>array('create')),
array('label'=>'Update ManifiestoOrdenesBultoLoading','url'=>array('update','id'=>$model->datos_extra)),
array('label'=>'Delete ManifiestoOrdenesBultoLoading','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->datos_extra),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage ManifiestoOrdenesBultoLoading','url'=>array('admin')),
);
?>

<h1>View ManifiestoOrdenesBultoLoading #<?php echo $model->datos_extra; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id_manifiesto',
		'id_orden',
		'id_tipo',
		'id_bulto',
		'id_con',
		'id_loading',
		'datos_extra',
),
)); ?>
