<?php
$this->breadcrumbs=array(
  'Perfiles'=>array('index'),
  $model->id_perfil_sistema,
);

$this->menu=array(
  array('label'=>'Lista de Perfiles','url'=>array('index')),
  array('label'=>'Crear Perfil','url'=>array('create')),
  array('label'=>'Actualizar Perfil','url'=>array('update','id'=>$model->id_perfil_sistema)),
  array('label'=>'Eliminar Perfil','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_perfil_sistema),'confirm'=>'Are you sure you want to delete this item?')),
  array('label'=>'Administración de Perfiles','url'=>array('admin')),
);
?>

<h1>Perfil #<?php echo $model->id_perfil_sistema; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
  'data'=>$model,
  'attributes'=>array(
    'id_perfil_sistema',
    'nombre',
    'estatus',
  ),
)); ?>
