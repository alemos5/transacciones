<?php
$this->breadcrumbs=array(
	'Emails'=>array('index'),
	$model->id_email,
);

$this->menu=array(
array('label'=>'List Email','url'=>array('index')),
array('label'=>'Create Email','url'=>array('create')),
array('label'=>'Update Email','url'=>array('update','id'=>$model->id_email)),
array('label'=>'Delete Email','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_email),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage Email','url'=>array('admin')),
);
?>

<h1>View Email #<?php echo $model->id_email; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id_email',
		'code_cliente',
		'tipo_email',
		'estatus',
		'id_orden',
		'descripcion',
		'mensaje',
),
)); ?>
