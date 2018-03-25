<?php
$this->breadcrumbs=array(
	'Tarifa Productos'=>array('index'),
	$model->id_tarifa_producto=>array('view','id'=>$model->id_tarifa_producto),
	'Update',
);

$this->menu=array(
array('label'=>'Listar TarifaProducto','url'=>array('index')),
array('label'=>'Crear TarifaProducto','url'=>array('create')),
array('label'=>'Detallar TarifaProducto','url'=>array('view','id'=>$model->id_tarifa_producto)),
array('label'=>'Administración TarifaProducto','url'=>array('admin')),
);
?>

<span  class="ez">Actualizar TarifaProducto <?php echo $model->id_tarifa_producto; ?></span>

<div class="pd-inner">
    <?php echo $this->renderPartial('_form',array('model'=>$model)); ?></div>
