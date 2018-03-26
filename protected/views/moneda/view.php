<?php
$this->breadcrumbs=array(
	'Monedas'=>array('index'),
	$model->id_moneda,
);

$this->menu=array(
array('label'=>'Listar Moneda','url'=>array('index')),
array('label'=>'Crear Moneda','url'=>array('create')),
array('label'=>'Actualizar Moneda','url'=>array('update','id'=>$model->id_moneda)),
array('label'=>'Eliminar Moneda','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_moneda),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Administración de Moneda','url'=>array('admin')),
);
?>

<span  class="ez">Detallar Moneda #<?php echo $model->id_moneda; ?></span>

<div class="pd-inner">
    <?php $this->widget('booster.widgets.TbDetailView',array(
    'data'=>$model,
    'attributes'=>array(
    		'id_moneda',
		'moneda',
		'alias',
		//'estatus',
        array(
            'label'=>'Estatus:',
            'value'=>$model->idEstatus->estatus_titulo,
        ),
    ),
    )); ?>
</div>
