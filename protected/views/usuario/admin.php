<?php
$this->breadcrumbs=array(
	'Users'=>array('index'),
	'Administrar',
);

$this->menu=array(
array('label'=>'List Users','url'=>array('index')),
array('label'=>'Create User','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('usuario-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<span class="ez">Administración de Usuarios</span>
<div class="pd-inner">

<?php $this->widget('booster.widgets.TbGridView',array(
'id'=>'usuario-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
		'id_usuario_sistema',
		//'tipo_documento',
		//'cedula',
		//'rif',
		'primer_nombre',
		'segundo_nombre',
		'correo',
		'code_cliente',
		/*
		'primer_apellido',
		'segundo_apellido',
		'fecha_nacimiento',
		'sexo',
		'observacion_personal',
		'a_r',
		'n_j',
		'razon_social',
		'tlf_habitacion',
		'tlf_personal',
		'tlf_personal2',
		'correo',
		'correo2',
		'autorizacion',
		'img',
		'usuario',
		'contrasena',
		'id_perfil_sistema',
		'fecha_registro',
		'estatus',
		'estatus_contrasena',
		'direccion_ip',
		'id_registrador',
		'id_sociedad',
		'latitud',
		'longitud',
		*/
array(
'class'=>'booster.widgets.TbButtonColumn',
),
),
)); ?>
</div>