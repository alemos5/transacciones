<?php
$this->breadcrumbs=array(
	'Users'=>array('index'),
	$model->id_usuario_sistema=>array('view','id'=>$model->id_usuario_sistema),
	'Actualizar',
);

	$this->menu=array(
//	array('label'=>'Listar Usuarios','url'=>array('index')),
//	array('label'=>'Crear Usuarios','url'=>array('create')),
	array('label'=>__('User details'),'url'=>array('view','id'=>$model->id_usuario_sistema)),
//	array('label'=>'Administrar Usuario','url'=>array('admin')),
	);
	?>

<span class="ez"><?php echo __('Update User Data'); ?></span>

<div class="pd-inner">
    <?php echo $this->renderPartial('_form',array('model'=>$model)); ?>
</div>