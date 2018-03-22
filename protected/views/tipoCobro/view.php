<?php
$this->breadcrumbs=array(
	'Tipo Cobros'=>array('index'),
	$model->id_tipo_cobro,
);

$this->menu=array(
array('label'=>'Listar Tipos de Cobros','url'=>array('index')),
array('label'=>'Crear Tipo de Cobro','url'=>array('create')),
array('label'=>'Actualizar Tipo de Cobro','url'=>array('update','id'=>$model->id_tipo_cobro)),
array('label'=>'Eliminar Tipo de Cobro','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_tipo_cobro),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Administrar Tipos de Cobros','url'=>array('admin')),
);
?>
<span class="ez">Detalles del tipo de cobro</span>
<div class="pd-inner">
<?php $this->widget('booster.widgets.TbDetailView',array(
    'type' => 'striped bordered hover',
    'data'=>$model,
    'attributes'=>array(
                    'id_tipo_cobro',
                    'tipo_cobro',
    //		'estatus',
    ),
)); ?>
</div>
