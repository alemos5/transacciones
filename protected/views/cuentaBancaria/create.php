<?php
$this->breadcrumbs=array(
	'Cuenta Bancarias'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'Listar CuentaBancaria','url'=>array('index')),
array('label'=>'Administración de CuentaBancaria','url'=>array('admin')),
);
?>

<span  class="ez">Crear CuentaBancaria</span>

<div class="pd-inner">
    <?php echo $this->renderPartial('_form', array('model'=>$model)); ?></div>