<?php
$this->breadcrumbs=array(
	'Tipo Pagos'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List TipoPago','url'=>array('index')),
array('label'=>'Manage TipoPago','url'=>array('admin')),
);
?>

<h1>Create TipoPago</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>