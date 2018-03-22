<?php
$this->breadcrumbs=array(
	'Clientes'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List Clientes','url'=>array('index')),
array('label'=>'Manage Clientes','url'=>array('admin')),
);
?>

<span  class="ez">Crear Clientes</span>

<div class="pd-inner">
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
</div>