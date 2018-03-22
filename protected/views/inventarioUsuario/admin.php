<?php
$this->breadcrumbs=array(
	'Inventario Usuarios'=>array('index'),
	'Manage',
);

$this->menu=array(
array('label'=>'List InventarioUsuario','url'=>array('index')),
array('label'=>'Create InventarioUsuario','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('inventario-usuario-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<span class="ez">Administración de Inventario</span>
<div class="pd-inner">
<?php $this->widget('booster.widgets.TbGridView',array(
'id'=>'inventario-usuario-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
//		'idinventario_usuario',
//		'id_usuario_sistema',
                'code_cliente',
                'producto',
                'peso',
                'precio',
                'cantidad',
                'descripcion',
                /*
                'id_registrador',
                'fecha_registro',
                'id_modificador',
                'fecha_modificacion',
                */
array(
'class'=>'booster.widgets.TbButtonColumn',
),
),
)); ?>
</div>