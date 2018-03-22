<?php
$this->breadcrumbs=array(
	'Manifiestos'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'Listar Manifiesto','url'=>array('index')),
array('label'=>'Administrar Manifiesto','url'=>array('admin')),
);
?>

<span  class="ez">Crear Manifiesto</span>

<div class="pd-inner">
    <?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
</div>