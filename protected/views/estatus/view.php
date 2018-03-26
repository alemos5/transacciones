<?php
$this->breadcrumbs=array(
	'Estatuses'=>array('index'),
	$model->estatus,
);

$this->menu=array(
array('label'=>'Listar Estatus','url'=>array('index')),
array('label'=>'Crear Estatus','url'=>array('create')),
array('label'=>'Actualizar Estatus','url'=>array('update','id'=>$model->estatus)),
array('label'=>'Eliminar Estatus','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->estatus),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Administración de Estatus','url'=>array('admin')),
);
?>

<span  class="ez">Detallar Estatus #<?php echo $model->estatus; ?></span>

<div class="pd-inner">
    <?php $this->widget('booster.widgets.TbDetailView',array(
    'data'=>$model,
    'attributes'=>array(
    		'estatus',
		'estatus_titulo',
    ),
    )); ?>
</div>
