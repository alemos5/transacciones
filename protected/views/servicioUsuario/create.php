<?php
$this->breadcrumbs=array(
	'Servicio Usuarios'=>array('index'),
	'Crear',
);

$this->menu=array(
array('label'=>'Listar Servicios especiales por Usuario','url'=>array('index')),
array('label'=>'Administrar Servicios especiales por Usuario','url'=>array('admin')),
);
?>


<span  class="ez">Crear un nuevo servicio por usuario</span>

<div class="pd-inner">
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
</div>