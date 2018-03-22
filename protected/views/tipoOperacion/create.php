<?php
$this->breadcrumbs=array(
	'Tipo Operacions'=>array('index'),
	'Crear',
);

$this->menu=array(
array('label'=>'Listar Resultados','url'=>array('index')),
array('label'=>'Administrar Resultados','url'=>array('admin')),
);
?>

<span class="ez">Crear Resultados</span>

<div class="pd-inner">
    <?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
</div>