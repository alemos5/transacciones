<?php
$this->breadcrumbs=array(
	'Empresas'=>array('index'),
	$model->id_empresa,
);

$this->menu=array(
array('label'=>'Listar Empresas','url'=>array('index')),
array('label'=>'Crear Empresa','url'=>array('create')),
array('label'=>'Actualizar Empresa','url'=>array('update','id'=>$model->id_empresa)),
array('label'=>'Eliminar Empresa','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_empresa),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Administrar Empresas','url'=>array('admin')),
);
?>


<span class="ez">Detallar empresa</span>
<div class="pd-inner">
<?php $this->widget('booster.widgets.TbDetailView',array(
            'type' => 'striped bordered hover',
'data'=>$model,
'attributes'=>array(
		'id_empresa',
		'empresa',
		'descripcion',
//		'estatus',
),
)); ?>
</div>