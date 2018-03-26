<?php
$this->breadcrumbs=array(
	'Estatuses'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'Listar Estatus','url'=>array('index')),
array('label'=>'Administración de Estatus','url'=>array('admin')),
);
?>

<span  class="ez">Crear Estatus</span>

<div class="pd-inner">
    <?php echo $this->renderPartial('_form', array('model'=>$model)); ?></div>