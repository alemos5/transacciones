<?php
$this->breadcrumbs=array(
	'Inventario Usuarios'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'Listar Inventario a Usuario','url'=>array('index')),
array('label'=>'Administrar Inventario de Usuario','url'=>array('admin')),
);
?>


<span  class="ez">Crear inventario a Usuario</span>

<div class="pd-inner">
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
</div>