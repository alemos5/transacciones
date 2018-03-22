<?php
$this->breadcrumbs=array(
	'Paises'=>array('index'),
	$model->id_pais=>array('view','id'=>$model->id_pais),
	'Update',
);

	$this->menu=array(
	array('label'=>'Listar País','url'=>array('index')),
	array('label'=>'Crear País','url'=>array('create')),
	array('label'=>'Detallar País','url'=>array('view','id'=>$model->id_pais)),
	array('label'=>'Administrar País','url'=>array('admin')),
	);
	?>

    <span  class="ez">Actualizar País</span>

    <div class="pd-inner">
        <?php echo $this->renderPartial('_form',array('model'=>$model)); ?>
    </div>
