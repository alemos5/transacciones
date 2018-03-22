<?php
$this->breadcrumbs=array(
	'Tipo Envios'=>array('index'),
	$model->id_tipo_envio=>array('view','id'=>$model->id_tipo_envio),
	'Update',
);

	$this->menu=array(
	array('label'=>'Listar Tipo de Envío','url'=>array('index')),
	array('label'=>'Crear Tipo de Envío','url'=>array('create')),
	array('label'=>'Detallar Tipo de Envío','url'=>array('view','id'=>$model->id_tipo_envio)),
	array('label'=>'Administrar Tipo de Envío','url'=>array('admin')),
	);
	?>

    <span  class="ez">Actualizar Tipo de Envío</span>
    <div class="pd-inner">
        <?php echo $this->renderPartial('_form',array('model'=>$model)); ?>
    </div>
