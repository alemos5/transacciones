<?php
$this->breadcrumbs=array(
	'Trakings'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'Listar Tracking','url'=>array('index')),
array('label'=>'Administrar Tracking','url'=>array('admin')),
);
?>

<span class="ez">Crear Tracking</span>

<div class="pd-inner">
    <?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
</div>