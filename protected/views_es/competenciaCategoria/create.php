<?php
$this->breadcrumbs=array(
	'Competencia Categorias'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List CompetenciaCategoria','url'=>array('index')),
array('label'=>'Manage CompetenciaCategoria','url'=>array('admin')),
);
?>

<h1>Create CompetenciaCategoria</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>