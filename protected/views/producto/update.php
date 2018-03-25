<?php
$this->breadcrumbs=array(
	'Productos'=>array('index'),
	$model->id_producto=>array('view','id'=>$model->id_producto),
	'Update',
);

$this->menu=array(
array('label'=>'Listar Producto','url'=>array('index')),
array('label'=>'Crear Producto','url'=>array('create')),
array('label'=>'Detallar Producto','url'=>array('view','id'=>$model->id_producto)),
array('label'=>'Administración Producto','url'=>array('admin')),
);
?>

<span  class="ez">Actualizar Producto <?php echo $model->id_producto; ?></span>

<div class="pd-inner">
    <?php echo $this->renderPartial('_form',array('model'=>$model)); ?></div>
