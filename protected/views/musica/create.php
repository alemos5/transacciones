<?php
$this->breadcrumbs=array(
	'Musicas'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List Musica','url'=>array('index')),
array('label'=>'Manage Musica','url'=>array('admin')),
);
?>

<h1>Create Musica</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>