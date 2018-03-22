<?php
$this->breadcrumbs=array(
	'Ordenes'=>array('index'),
	'Crear',
);

$this->menu=array(
array('label'=>'Listar Ordenes','url'=>array('index')),
array('label'=>'Administrar Ordenes','url'=>array('admin')),
);
?>

<span  class="ez">Crear Manifiesto</span>

<div class="pd-inner">
    <?php 
    
    
    
    
    
    echo $this->renderPartial('_form', array('model'=>$model)); ?>
</div>