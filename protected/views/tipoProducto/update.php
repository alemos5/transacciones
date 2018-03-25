<?php
$this->breadcrumbs=array(
	'Tipo Productos'=>array('index'),
	$model->id_tipo_producto=>array('view','id'=>$model->id_tipo_producto),
	'Update',
);

$this->menu=array(
array('label'=>'Listar TipoProducto','url'=>array('index')),
array('label'=>'Crear TipoProducto','url'=>array('create')),
array('label'=>'Detallar TipoProducto','url'=>array('view','id'=>$model->id_tipo_producto)),
array('label'=>'Administración TipoProducto','url'=>array('admin')),
);
?>

<span  class="ez">Actualizar TipoProducto <?php echo $model->id_tipo_producto; ?></span>

<div class="pd-inner">
    <?php echo $this->renderPartial('_form',array('model'=>$model)); ?></div>
