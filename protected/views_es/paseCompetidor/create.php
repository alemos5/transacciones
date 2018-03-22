<?php
$this->breadcrumbs=array(
	'Pase Competidors'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List PaseCompetidor','url'=>array('index')),
array('label'=>'Manage PaseCompetidor','url'=>array('admin')),
);
?>

<h1>Create PaseCompetidor</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>