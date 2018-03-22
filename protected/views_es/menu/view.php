<?php $this->breadcrumbs=array(
  'Menus'=>array('index'),
  $model->id_menu_sistema,
);

$this->menu=array(
  array('label'=>'Lista de Menus','url'=>array('index')),
  array('label'=>'Crear Menu','url'=>array('create')),
  array('label'=>'Modificar Menu','url'=>array('update','id'=>$model->id_menu_sistema)),
  array('label'=>'Eliminar Menu','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_menu_sistema),'confirm'=>'Are you sure you want to delete this item?')),
  array('label'=>'Administración de Menus','url'=>array('admin')),
);
$estatus = array('Inactivo', 'Activo') ?>

<h1>Ver Menu #<?php echo $model->id_menu_sistema; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
  'data'=>$model,
  'attributes'=>array(
    'id_menu_sistema',
    'nombre',
    'ruta',
    array(
      'label'=>'Padre',
      'type'=>'raw',
      'value'=>CHtml::encode($model->padreMenu->nombre?$model->padreMenu->nombre:'Sin padre'),
    ),
    'nivel',
    array(
      'label'=>'Estatus',
      'type'=>'raw',
      'value'=>CHtml::encode($estatus[$model->estatus]),
    ),
  ),
)); ?>