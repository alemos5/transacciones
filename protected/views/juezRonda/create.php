<?php
$this->breadcrumbs=array(
	'Juez Rondas'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List JuezRonda','url'=>array('index')),
array('label'=>'Manage JuezRonda','url'=>array('admin')),
);
?>

<h1>Create JuezRonda</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>