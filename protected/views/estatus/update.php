<?php
$this->breadcrumbs=array(
	'Estatuses'=>array('index'),
	$model->estatus=>array('view','id'=>$model->estatus),
	'Update',
);

$this->menu=array(
array('label'=>'Listar Estatus','url'=>array('index')),
array('label'=>'Crear Estatus','url'=>array('create')),
array('label'=>'Detallar Estatus','url'=>array('view','id'=>$model->estatus)),
array('label'=>'Administración Estatus','url'=>array('admin')),
);
?>

<span  class="ez">Actualizar Estatus <?php echo $model->estatus; ?></span>

<div class="pd-inner">
    <?php echo $this->renderPartial('_form',array('model'=>$model)); ?></div>
