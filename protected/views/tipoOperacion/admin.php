<?php
$this->breadcrumbs=array(
	'Tipo Operacions'=>array('index'),
	'Administrar',
);

$this->menu=array(
array('label'=>'Listar Resultado','url'=>array('index')),
array('label'=>'Crear Resultado','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('tipo-operacion-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<span class="ez">Administración de Resultados</span>
<div class="pd-inner">


<?php 
function estatus($estatus){
    if($estatus == 0){
        $estatus = "Inactivo";
    }
    if($estatus == 1){
        $estatus = "Activo";
    }
    return $estatus;
}
$this->widget('booster.widgets.TbGridView',array(
'id'=>'tipo-operacion-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
		'id_tipo_operacion',
		'tipo_operacion',
		'observacion',
		array(
                  'filter'=>CHtml::listData(Estatus::model()->findAll(),'id_estatus','estatus'),
                  'name'=>'estatus',
                  'type'=>'raw',
                  'value'=>'estatus($data->estatus);',
                ),
//		'id_usuario_sistema_reg',
//		'fecha_reg',
		/*
		'id_usuario_sistema_mod',
		'ip_reg',
		'fecha_mod',
		'ip_mod',
		*/
array(
'class'=>'booster.widgets.TbButtonColumn',
),
),
)); ?>
