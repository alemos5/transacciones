<?php
$this->breadcrumbs=array(
	'Ordenes Estatuses'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List OrdenesEstatus','url'=>array('index')),
array('label'=>'Manage OrdenesEstatus','url'=>array('admin')),
);
?>

<h1>Create OrdenesEstatus</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>