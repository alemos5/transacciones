<?php
$this->breadcrumbs=array(
	'Bancos'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'Listar Banco','url'=>array('index')),
array('label'=>'Administración de Banco','url'=>array('admin')),
);
?>

<span  class="ez">Crear Banco</span>

<div class="pd-inner">
    <?php echo $this->renderPartial('_form', array('model'=>$model)); ?></div>