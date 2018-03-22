<?php
$this->breadcrumbs=array(
	'Ordenes Clientes'=>array('index'),
	'Manage',
);

$this->menu=array(
array('label'=>'Listar Prealertas','url'=>array('index')),
array('label'=>'Crear Prealertas','url'=>array('create')),
);


?>
<span  class="ez">Administrar Prealerta</span>

<div class="pd-inner">
<?php $this->widget('booster.widgets.TbGridView',array(
'id'=>'ordenes-cliente-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
//		'id_orden_cli',
//		'id_cli',
                'fecha',
		'nu_orden',
		'tienda',
		'descripcion',
                'tracking',
//		'doc',
		/*
		'valor',
		'tracking',
		'courier',
		'fecha',
		'observacion',
		*/
array(
'class'=>'booster.widgets.TbButtonColumn',
),
),
)); ?>
</div>