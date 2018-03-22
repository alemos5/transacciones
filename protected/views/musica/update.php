<?php
$this->breadcrumbs=array(
	'Musicas'=>array('index'),
	$model->id_musica=>array('view','id'=>$model->id_musica),
	'Update',
);

	$this->menu=array(
	array('label'=>'List Musica','url'=>array('index')),
	array('label'=>'Create Musica','url'=>array('create')),
	array('label'=>'View Musica','url'=>array('view','id'=>$model->id_musica)),
	array('label'=>'Manage Musica','url'=>array('admin')),
	);
	?>

	<h1>Update Musica <?php echo $model->id_musica; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>