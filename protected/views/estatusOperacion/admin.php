<?php
$this->breadcrumbs=array(
	'Estatus Operacions'=>array('index'),
	'Administrar',
);

$this->menu=array(
array('label'=>'Listar Tipos Operaciones','url'=>array('index')),
array('label'=>'Crear Tipo Operación','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('estatus-operacion-grid', {
data: $(this).serialize()
});
return false;
});
");
?>


<span class="ez">Administración de Tipos de Operaciones</span>
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
'id'=>'estatus-operacion-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
		'id_estatus_operacion',
		'estatus_operacion',
		'observacion',
                array(
                  'filter'=>CHtml::listData(Estatus::model()->findAll(),'id_estatus','estatus'),
                  'name'=>'estatus',
                  'type'=>'raw',
                  'value'=>'estatus($data->estatus);',
                ),
//		'id_usuario_sistema_reg',
//		'fecha_reg',
//		'ip_reg',
		/*
		'id_usuario_sistema_mod',
		'fecha_mod',
		'ip_mod',
		*/
array(
'class'=>'booster.widgets.TbButtonColumn',
),
),
)); ?>
</div>