<?php
$this->breadcrumbs=array(
	'Consolidaciones'=>array('index'),
	'Manage',
);

$this->menu=array(
array('label'=>'List Consolidaciones','url'=>array('index')),
array('label'=>'Create Consolidaciones','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('consolidaciones-grid', {
data: $(this).serialize()
});
return false;
});
");
?>
<span  class="ez">Consolidaciones</span>

<div class="pd-inner">
<?php $this->widget('booster.widgets.TbGridView',array(
'id'=>'consolidaciones-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
		'id_con',
//		'id_cliente',
		'ware_reciept',
//		'direccion',
//		'alto',
//		'ancho',
                array(
                    'header'=>'Código Cliente',
                    'name'=>'id_cliente',
                    'value'=>'$data->idCliente->code_cliente'
                ),
                array(
                    'header'=>'Código Cliente',
                    'name'=>'id_cliente',
                    'value'=>'$data->idCliente->nombre'
                ),
//                array(
//                    'header'=>'Cliente',
//                    'name'=>'id_cliente',
//                    'value'=>$model->idCliente->nombre
//                ),
		/*
		'largo',
		'peso',
		'instruccion',
		'status',
		'seguro',
		'pt',
		'cost_env',
		'fecha',
		'cost_orden',
		'tasa_de_cambio',
		'int_manejo',
		'int_documentacion',
		'int_gastos_administrativos',
		'int_reempaque',
		'int_descuento',
		'int_devolucion',
		'int_almacenaje',
		'int_comision_tc',
		'int_desaduanamiento',
		'cliente_manifiesto',
		'ultima_milla',
		'estatus_manifiesto',
		'info_extra',
		*/
array(
'class'=>'booster.widgets.TbButtonColumn',
),
),
)); ?>
</div>