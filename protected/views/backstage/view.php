<?php
$this->breadcrumbs=array(
	'Backstages'=>array('index'),
	$model->id_backstage,
);

$this->menu=array(
array('label'=>'List Backstage','url'=>array('index')),
array('label'=>'Create Backstage','url'=>array('create')),
array('label'=>'Update Backstage','url'=>array('update','id'=>$model->id_backstage)),
array('label'=>'Delete Backstage','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_backstage),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage Backstage','url'=>array('admin')),
);
?>

<h1>View Backstage #<?php echo $model->id_backstage; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id_backstage',
		'backstage',
		'estatus',
),
)); ?>
