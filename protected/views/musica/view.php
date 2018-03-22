<?php
$this->breadcrumbs=array(
	'Musicas'=>array('index'),
	$model->id_musica,
);

$this->menu=array(
array('label'=>'List Musica','url'=>array('index')),
array('label'=>'Create Musica','url'=>array('create')),
array('label'=>'Update Musica','url'=>array('update','id'=>$model->id_musica)),
array('label'=>'Delete Musica','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_musica),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage Musica','url'=>array('admin')),
);
?>

<h1>View Musica #<?php echo $model->id_musica; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id_musica',
		'musica',
		'estatus',
),
)); ?>
