<?php
$this->breadcrumbs=array(
	'Parish'=>array('index'),
	$model->id_parroquia,
);

$this->menu=array(
array('label'=>'List parish','url'=>array('index')),
array('label'=>'Create parish','url'=>array('create')),
array('label'=>'Update parish','url'=>array('update','id'=>$model->id_parroquia)),
array('label'=>'Delete parish','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_parroquia),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage parish','url'=>array('admin')),
);
?>

<h1>View parish #<?php echo $model->id_parroquia; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id_parroquia',
		'id_municipio',
		'nombre',
		'estatus',
),
)); ?>
