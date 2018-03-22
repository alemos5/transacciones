<?php
$this->breadcrumbs=array(
  'Perfiles'=>array('index'),
  'Administración de Perfiles',
);

$this->menu=array(
  array('label'=>'Lista de Perfiles','url'=>array('index')),
  array('label'=>'Crear Perfil','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
  $('.search-button').click(function(){
  $('.search-form').toggle();
  return false;
  });
  $('.search-form form').submit(function(){
  $.fn.yiiGridView.update('perfil-grid', {
  data: $(this).serialize()
  });
  return false;
  });
");
?>

<h1>Administración de Perfiles</h1>

<p>
  También puede escribir un operador de comparación (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b> &lt;&gt;</b>
  o <b>=</b>) al principio de cada uno de los valores de búsqueda para especificar cómo se debe hacer la comparación.
</p>

<?php echo CHtml::link('Búsqueda Avanzada','#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array('model'=>$model)); ?>
</div><!-- search-form -->

<?php $this->widget('booster.widgets.TbGridView',array(
  'id'=>'perfil-grid',
  'dataProvider'=>$model->search(),
  'filter'=>$model,
  'columns'=>array(
    'id_perfil_sistema',
    'nombre',
    'estatus',
    array(
      'class'=>'booster.widgets.TbButtonColumn',
    ),
  ),
)); ?>
