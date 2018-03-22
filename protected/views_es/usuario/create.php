<?php
$this->breadcrumbs=array(
	'Usuarios'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'Listar Usuario','url'=>array('index')),
array('label'=>'Administrar Usuario','url'=>array('admin')),
);
?>

<span class="ez">Crear un nuevo Usuario</span>

<div class="pd-inner">
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
</div>