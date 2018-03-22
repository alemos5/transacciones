<?php
$this->breadcrumbs=array(
	'Estatus Operacions'=>array('index'),
	$model->id_estatus_operacion,
);

$this->menu=array(
array('label'=>'Listar Tipoo de Operaciones','url'=>array('index')),
array('label'=>'Crear Tipo de Operación','url'=>array('create')),
array('label'=>'Actualizar Tipo de Operación','url'=>array('update','id'=>$model->id_estatus_operacion)),
array('label'=>'Eliminar Tipo de Operación','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_estatus_operacion),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Administrar Tipos de Operaciones','url'=>array('admin')),
);



?>

<span class="ez">Datos de Tipo de Operación</span>
<div class="pd-inner">
<?php 
$date = new Date();
function estatus($estatus){
    if($estatus == 0){
        $estatus = "Inactivo";
    }
    if($estatus == 1){
        $estatus = "Activo";
    }
    return $estatus;
}
function vacio($vacio){
    if($vacio == "" || $vacio == NULL){
        $vacio = NULL;
    }
    return $vacio;
}
$this->widget('booster.widgets.TbDetailView',array(
'type' => 'striped bordered hover',
'data'=>$model,
'attributes'=>array(
		'id_estatus_operacion',
		'estatus_operacion',
		array(
                    'label'=>'observacion',
                    'value'=>vacio($model->observacion),
                ),
		array(
                    'label'=>'Estatus',
                    'value'=>estatus($model->estatus),
                ),
//		'id_usuario_sistema_reg',
//		'fecha_reg',
//		'ip_reg',
//		'id_usuario_sistema_mod',
//		'fecha_mod',
//		'ip_mod',
),
)); ?>
</div>
