<?php $this->breadcrumbs=array(
  'Usuarios'=>array('index'),
  'Administración de Usuarios',
);

$this->menu=array(
array('label'=>'Lista de Usuarios','url'=>array('index')),
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
"); ?>

<h1>Administración de Usuarios</h1>

<p>
  También puede escribir un operador de comparación (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b> &lt;&gt;</b>
  o <b>=</b>) al principio de cada uno de los valores de búsqueda para especificar cómo se debe hacer la comparación.
</p>

<?php echo CHtml::link('Búqueda Avanzada','#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array('model'=>$model,)); ?>
</div><!-- search-form -->

<?php $this->widget('booster.widgets.TbGridView',array(
  'id'=>'usuario-grid',
  'dataProvider'=>$model->search(),
  'filter'=>$model,
  'columns'=>array(
    'cedula',
    'usuario',
    'primer_nombre',
    'primer_apellido',
    /*
    'segundo_apellido',
    'fecha_nacimiento',
    'sexo',
    'observacion_personal',
    'contrasena',
    'fecha_registro',
    'estatus',
    'estatus_contrasena',
    'id_perfil_sistema',
    'direccion_ip',
    'id_registrador',
    */
    array('class'=>'booster.widgets.TbButtonColumn',),
  ),
)); ?>