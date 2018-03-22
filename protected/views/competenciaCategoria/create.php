<?php
$this->breadcrumbs=array(
	'Competence Category'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List  Competence Category','url'=>array('index')),
array('label'=>'Manage  Competence Category','url'=>array('admin')),
);
?>

<h1>Create  Competence Category</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>