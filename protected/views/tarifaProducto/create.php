<?php
$this->breadcrumbs=array(
	'Tarifa Productos'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'Listar TarifaProducto','url'=>array('index')),
array('label'=>'Administración de TarifaProducto','url'=>array('admin')),
);
?>

<span  class="ez">Crear TarifaProducto</span>

<div class="pd-inner">
    <?php echo $this->renderPartial('_form', array('model'=>$model)); ?></div>