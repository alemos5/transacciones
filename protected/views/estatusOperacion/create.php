<?php
$this->breadcrumbs=array(
	'Estatus Operacions'=>array('index'),
	'Crear',
);

$this->menu=array(
array('label'=>'Listar Tipos de Operaciones','url'=>array('index')),
array('label'=>'Administrar Tipos de Operaciones','url'=>array('admin')),
);
?>

<span class="ez">Crear un nuevo tipo de operación</span>

<div class="pd-inner">
    <?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
</div>