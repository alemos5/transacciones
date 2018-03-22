<?php
$this->breadcrumbs=array(
	'Inventario Usuarios'=>array('index'),
	$model->idinventario_usuario,
);

$this->menu=array(
array('label'=>'Listar Inventario de Usuario','url'=>array('index')),
array('label'=>'Crear Inventario a Usuario','url'=>array('create')),
array('label'=>'Actualizar Inventario a Usuario','url'=>array('update','id'=>$model->idinventario_usuario)),
array('label'=>'Eliminar Inventario a Usuario','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->idinventario_usuario),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Administrar Inventario de Usuario','url'=>array('admin')),
);
?>

<span  class="ez">Detallar inventario a Usuario</span>

<div class="pd-inner">
<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
//		'idinventario_usuario',
//		'id_usuario_sistema',
                array(
                    'label'=>'Cliente:',
                    'value'=>$model->idClientes->nombre,
                ),
		'code_cliente',
		'producto',
		'distribuidor',
		'peso',
		'precio',
        'cantidad',
        'descripcion',
//		'id_registrador',
//		'fecha_registro',
//		'id_modificador',
//		'fecha_modificacion',
),
)); ?>
</div>
