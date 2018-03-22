<?php
$this->breadcrumbs=array(
	'Unidad Medidas'=>array('index'),
	'Crear',
);

$this->menu=array(
array('label'=>'Listar Unidades de Medidas','url'=>array('index')),
array('label'=>'Administrar Unidades de Medidas','url'=>array('admin')),
);
?>

<span  class="ez">Crear una nueva Unidad de Medida</span>

<div class="pd-inner">
    <?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
</div>