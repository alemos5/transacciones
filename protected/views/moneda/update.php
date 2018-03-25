<?php
$this->breadcrumbs=array(
	'Monedas'=>array('index'),
	$model->id_moneda=>array('view','id'=>$model->id_moneda),
	'Update',
);

$this->menu=array(
array('label'=>'Listar Moneda','url'=>array('index')),
array('label'=>'Crear Moneda','url'=>array('create')),
array('label'=>'Detallar Moneda','url'=>array('view','id'=>$model->id_moneda)),
array('label'=>'Administración Moneda','url'=>array('admin')),
);
?>

<span  class="ez">Actualizar Moneda <?php echo $model->id_moneda; ?></span>

<div class="pd-inner">
    <?php echo $this->renderPartial('_form',array('model'=>$model)); ?></div>
