<?php
$this->breadcrumbs=array(
	'Paises'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'Listar País','url'=>array('index')),
array('label'=>'Administrar País','url'=>array('admin')),
);
?>
<span  class="ez">Crear País</span>

<div class="pd-inner">
    <?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
</div>
