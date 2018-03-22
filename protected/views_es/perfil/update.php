<?php
$this->breadcrumbs=array(
  'Perfiles'=>array('index'),
  $model->id_perfil_sistema=>array('view','id'=>$model->id_perfil_sistema),
  'Actualizar',
);

$this->menu=array(
  array('label'=>'Lista de Perfiles','url'=>array('index')),
  array('label'=>'Crear Perfil','url'=>array('create')),
  array('label'=>'Ver Perfil','url'=>array('view','id'=>$model->id_perfil_sistema)),
  array('label'=>'Administración de Perfiles','url'=>array('admin')),
);
?>

<h1>Actualizar Perfil <?php echo $model->id_perfil_sistema; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>