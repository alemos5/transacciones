<?php
$this->breadcrumbs=array(
	'Tipo Envios'=>array('index'),
	$model->id_tipo_envio,
);

$this->menu=array(
array('label'=>'Listar Tipo de Envío','url'=>array('index')),
array('label'=>'Crear Tipo de Envío','url'=>array('create')),
array('label'=>'Actualizar Tipo de Envío','url'=>array('update','id'=>$model->id_tipo_envio)),
array('label'=>'Eliminar Tipo de Envío','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_tipo_envio),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Administrar Tipo de Envío','url'=>array('admin')),
);
?>

<span  class="ez">Detallar Tipo de Envío</span>
<div class="pd-inner">
<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id_tipo_envio',
		'tipo_envio',
),
)); ?>
</div>