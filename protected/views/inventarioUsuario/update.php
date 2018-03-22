<?php
$this->breadcrumbs=array(
	'Inventario Usuarios'=>array('index'),
	$model->idinventario_usuario=>array('view','id'=>$model->idinventario_usuario),
	'Update',
);

	$this->menu=array(
	array('label'=>'Listar Inventario de Usuario','url'=>array('index')),
	array('label'=>'Crear Inventario a Usuario','url'=>array('create')),
	array('label'=>'Detallar Inventario a Usuario','url'=>array('view','id'=>$model->idinventario_usuario)),
	array('label'=>'Administrar Inventario de Usuario','url'=>array('admin')),
	);
	?>

	<span  class="ez">Actualizar inventario a Usuario</span>

<div class="pd-inner">
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>
</div>