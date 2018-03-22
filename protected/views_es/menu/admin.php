<?php $this->breadcrumbs=array(
  'Menus'=>array('index'),
  'Administración de Menus',
);

$this->menu=array(
  array('label'=>'Lista Menus','url'=>array('index')),
  array('label'=>'Crear Menu','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
  $('.search-button').click(function(){
  $('.search-form').toggle();
  return false;
  });
  $('.search-form form').submit(function(){
  $.fn.yiiGridView.update('menu-grid', {
  data: $(this).serialize()
  });
  return false;
  });
"); ?>

<h1>Administración de Menus</h1>

<p>
  También puede escribir un operador de comparación (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b> &lt;&gt;</b>
  o <b>=</b>) al principio de cada uno de los valores de búsqueda para especificar cómo se debe hacer la comparación.
</p>

<?php echo CHtml::link('Búqueda Avanzada','#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array('model'=>$model,)); ?>
</div><!-- search-form -->

<?php $this->widget('booster.widgets.TbGridView',array(
  'id'=>'menu-grid',
  'dataProvider'=>$model->search(),
  'filter'=>$model,
  'columns'=>array(
    'nombre',
    'ruta',
    array(
      'name'=>'padre', 
      'header'=>'Padre', 
      'filter'=>array('0'=>'Seleccione...')+CHtml::listData(Menu::model()->findAll(),
      'id_menu_sistema','nombre'),
      'value'=>'$data->padreMenu->nombre',
    ),
    'nivel',
    array(
      'name'=>'estatus', 
      'header'=>'Estatus', 
      'filter'=>array('0'=>'Inactivo','1'=>'Activo'), 
      'value'=>'($data->estatus=="1")?("Activo"):("Inactivo")'
    ),
    array('class'=>'booster.widgets.TbButtonColumn',),
  ),
)); ?>
