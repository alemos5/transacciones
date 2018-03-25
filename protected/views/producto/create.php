<?php
$this->breadcrumbs=array(
	'Productos'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'Listar Producto','url'=>array('index')),
array('label'=>'Administración de Producto','url'=>array('admin')),
);
?>

<span  class="ez">Crear Producto</span>

<div class="pd-inner">
    <?php echo $this->renderPartial('_form', array('model'=>$model)); ?></div>