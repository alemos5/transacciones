<?php
$this->breadcrumbs=array(
	'Operacions'=>array('index'),
	'Crear',
);

$this->menu=array(
array('label'=>'Listar Operaciones','url'=>array('index')),
array('label'=>'Administrar Operaciones','url'=>array('admin')),
);
?>


<span class="ez">Crear Operación</span>

<div class="pd-inner">
    <?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
</div>