<?php
$this->breadcrumbs=array(
	'Tipo Envios'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'Listar Tipo de Envío','url'=>array('index')),
array('label'=>'Administrar Tipos de Envío','url'=>array('admin')),
);
?>
<span  class="ez">Crear Tipo de Envío</span>
<div class="pd-inner">
    <?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
</div>
