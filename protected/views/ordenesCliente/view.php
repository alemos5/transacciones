<?php
$this->breadcrumbs=array(
	'Ordenes Clientes'=>array('index'),
	$model->id_orden_cli,
);

$this->menu=array(
array('label'=>'Listar Prealerta','url'=>array('index')),
array('label'=>'Crear Prealerta','url'=>array('create')),
array('label'=>'Actualizar Prealerta','url'=>array('update','id'=>$model->id_orden_cli)),
array('label'=>'Eliminar Prealerta','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_orden_cli),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Administrar Prealerta','url'=>array('admin')),
);
?>

<span  class="ez">Detallar Prealerta</span>

<div class="pd-inner">
<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
//		'id_orden_cli',
//		'id_cli',
		'nu_orden',
		'tienda',
		'descripcion',
//		'doc',
		'valor',
		'tracking',
		'courier',
//		'fecha',
		'observacion',
),
)); ?>
    <br>
    <center>
        <h4>Imágen del Producto</h4>
        <hr>
        <div class="row">
            <div class="col-xs-12">
                <!--<div class="view">-->
                    <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/prealerta/<?php echo $model->doc; ?>" class="img-thumbnail" alt="Producto" style=" width: auto; height: auto;" >
                <!--</div>-->
            </div>
        </div>
    </center>
</div>