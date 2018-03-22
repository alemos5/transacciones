<?php
$this->breadcrumbs=array(
	'Tipo Operacions'=>array('index'),
	$model->id_tipo_operacion,
);

$this->menu=array(
array('label'=>'Listar Resultados','url'=>array('index')),
array('label'=>'Crear Resultado','url'=>array('create')),
array('label'=>'Actualizar Resultado','url'=>array('update','id'=>$model->id_tipo_operacion)),
array('label'=>'Eliminar Resultado','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_tipo_operacion),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Administrar Resultados','url'=>array('admin')),
);
?>
<span class="ez">Datos del Resultado</span>
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
		'id_tipo_operacion',
		'tipo_operacion',
		'observacion',
		array(
                    'label'=>'Estatus',
                    'value'=>estatus($model->estatus),
                ),
//		'id_usuario_sistema_reg',
//		'fecha_reg',
//		'id_usuario_sistema_mod',
//		'ip_reg',
//		'fecha_mod',
//		'ip_mod',
),
)); ?>
</div>