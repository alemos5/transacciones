<?php
$this->breadcrumbs=array(
	'Usuarios'=>array('index'),
	'Administrar',
);

$this->menu=array(
array('label'=>'Listar Usuarios','url'=>array('index')),
array('label'=>'Crear Usuario','url'=>array('create')),
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

<span class="ez">Administrar Usuarios</span>
<div class="pd-inner">
<p>
  También puede escribir un operador de comparación (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b> &lt;&gt;</b>
  o <b>=</b>) al principio de cada uno de los valores de búsqueda para especificar cómo se debe hacer la comparación.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none">
	<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('booster.widgets.TbGridView',array(
'id'=>'usuario-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
		'id_usuario_sistema',
		'tipo_documento',
		'cedula',
		'rif',
		'primer_nombre',
		'segundo_nombre',
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