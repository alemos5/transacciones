<?php
$this->breadcrumbs=array(
	'Monedas'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'Listar Moneda','url'=>array('index')),
array('label'=>'Administración de Moneda','url'=>array('admin')),
);
?>

<span  class="ez">Crear Moneda</span>

<div class="pd-inner">
    <?php echo $this->renderPartial('_form', array('model'=>$model)); ?></div>