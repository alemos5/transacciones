<?php
$this->breadcrumbs=array(
	'Competence Type'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List  Competence Type','url'=>array('index')),
array('label'=>'Manage  Competence Type','url'=>array('admin')),
);
?>

<h1>Create  Competence Type</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>