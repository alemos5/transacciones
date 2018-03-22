<?php
$this->breadcrumbs=array(
	'Ordenes Consolidaciones'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List OrdenesConsolidaciones','url'=>array('index')),
array('label'=>'Manage OrdenesConsolidaciones','url'=>array('admin')),
);
?>

<h1>Create OrdenesConsolidaciones</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>