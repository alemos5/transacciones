<?php
$this->breadcrumbs=array(
	'Tipo Productos'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'Listar TipoProducto','url'=>array('index')),
array('label'=>'Administración de TipoProducto','url'=>array('admin')),
);
?>

<span  class="ez">Crear TipoProducto</span>

<div class="pd-inner">
    <?php echo $this->renderPartial('_form', array('model'=>$model)); ?></div>