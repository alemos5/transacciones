<?php
$this->breadcrumbs=array(
	'Bancos'=>array('index'),
	$model->id_banco,
);

$this->menu=array(
array('label'=>'Listar Banco','url'=>array('index')),
array('label'=>'Crear Banco','url'=>array('create')),
array('label'=>'Actualizar Banco','url'=>array('update','id'=>$model->id_banco)),
array('label'=>'Eliminar Banco','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_banco),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Administración de Banco','url'=>array('admin')),
);
?>

<span  class="ez">Detallar Banco #<?php echo $model->id_banco; ?></span>

<div class="pd-inner">
    <?php $this->widget('booster.widgets.TbDetailView',array(
    'data'=>$model,
    'attributes'=>array(
    		//'id_banco',
        array(
            'label'=>'País:',
            'value'=>$model->idPais->pais,
        ),
		//'id_pais',
		'banco',
		'siglas',
		//'estatus',
        array(
            'label'=>'Estatus:',
            'value'=>$model->idEstatus->estatus_titulo,
        ),
    ),
    )); ?>
</div>
