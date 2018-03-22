<?php
$this->breadcrumbs=array(
	'Competencia Tipos'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List CompetenciaTipo','url'=>array('index')),
array('label'=>'Manage CompetenciaTipo','url'=>array('admin')),
);
?>

<h1>Create CompetenciaTipo</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>