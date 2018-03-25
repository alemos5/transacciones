<?php
$this->breadcrumbs=array(
	'Operacions'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'Listar Operacion','url'=>array('index')),
array('label'=>'Administración de Operacion','url'=>array('admin')),
);
?>

<span  class="ez">Crear Operacion</span>

<div class="pd-inner">
    <?php echo $this->renderPartial('_form', array('model'=>$model)); ?></div>