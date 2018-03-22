<?php
$this->breadcrumbs=array(
	'Unidad Medidas'=>array('index'),
	$model->id_unidad_medida,
);

$this->menu=array(
array('label'=>'Listar Unidades de Medida','url'=>array('index')),
array('label'=>'Crear Unidad de Medida','url'=>array('create')),
array('label'=>'Actualizar Unidad de Medida','url'=>array('update','id'=>$model->id_unidad_medida)),
array('label'=>'Eliminar Unidad de Medida','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_unidad_medida),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Administrar Unidades de Medidas','url'=>array('admin')),
);
?>

<span class="ez">Detalles de la Unidad de Medida</span>
<div class="pd-inner">
<?php $this->widget('booster.widgets.TbDetailView',array(
    'type' => 'striped bordered hover',
    'data'=>$model,
    'attributes'=>array(
                    'id_unidad_medida',
                    'unidad_medida',
    //		'estatus',
    ),
)); ?>
</div>