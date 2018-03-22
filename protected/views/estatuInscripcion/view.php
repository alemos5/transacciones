<?php
$this->breadcrumbs=array(
	'Subscription status'=>array('index'),
	$model->id_estatu_inscripcion,
);

$this->menu=array(
array('label'=>'List  Subscription Status','url'=>array('index')),
array('label'=>'Create  Subscription Status','url'=>array('create')),
array('label'=>'Update  Subscription Status','url'=>array('update','id'=>$model->id_estatu_inscripcion)),
array('label'=>'Delete  Subscription Status','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_estatu_inscripcion),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage  Subscription Status','url'=>array('admin')),
);
?>

<h1>View  Subscription Status #<?php echo $model->id_estatu_inscripcion; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id_estatu_inscripcion',
		'estatu_inscripcion',
		'estatus',
		'descripcion',
),
)); ?>
