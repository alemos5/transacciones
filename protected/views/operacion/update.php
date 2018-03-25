<?php
$this->breadcrumbs=array(
	'Operacions'=>array('index'),
	$model->id_operacion=>array('view','id'=>$model->id_operacion),
	'Update',
);

$this->menu=array(
array('label'=>'Listar Operacion','url'=>array('index')),
array('label'=>'Crear Operacion','url'=>array('create')),
array('label'=>'Detallar Operacion','url'=>array('view','id'=>$model->id_operacion)),
array('label'=>'Administración Operacion','url'=>array('admin')),
);
?>

<span  class="ez">Actualizar Operacion <?php echo $model->id_operacion; ?></span>

<div class="pd-inner">
    <?php echo $this->renderPartial('_form',array('model'=>$model)); ?></div>
