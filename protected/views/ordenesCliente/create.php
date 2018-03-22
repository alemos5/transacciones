<?php
$this->breadcrumbs=array(
	'Ordenes Clientes'=>array('index'),
	'Crear',
);

$this->menu=array(
array('label'=>'Listar Prealerta','url'=>array('index')),
array('label'=>'Administrar Prealerta','url'=>array('admin')),
);
?>

<span  class="ez">Crear Prealerta</span>

<div class="pd-inner">
    <?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
</div>