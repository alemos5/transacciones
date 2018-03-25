<?php
$this->breadcrumbs=array(
	'Cuenta Bancarias'=>array('index'),
	$model->id_cuenta_bancaria=>array('view','id'=>$model->id_cuenta_bancaria),
	'Update',
);

$this->menu=array(
array('label'=>'Listar CuentaBancaria','url'=>array('index')),
array('label'=>'Crear CuentaBancaria','url'=>array('create')),
array('label'=>'Detallar CuentaBancaria','url'=>array('view','id'=>$model->id_cuenta_bancaria)),
array('label'=>'Administración CuentaBancaria','url'=>array('admin')),
);
?>

<span  class="ez">Actualizar CuentaBancaria <?php echo $model->id_cuenta_bancaria; ?></span>

<div class="pd-inner">
    <?php echo $this->renderPartial('_form',array('model'=>$model)); ?></div>
