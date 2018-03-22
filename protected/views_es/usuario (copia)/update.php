<?php
$this->breadcrumbs=array(
  'Usuarios'=>array('index'),
  $model->id_usuario_sistema=>array('view','id'=>$model->id_usuario_sistema),
  'Actualizar',
);

$this->menu=array(
  array('label'=>'Lista de Usuarios','url'=>array('index')),
  array('label'=>'Crear Usuario','url'=>array('create')),
  array('label'=>'Ver Usuario','url'=>array('view','id'=>$model->id_usuario_sistema)),
  array('label'=>'Administración de Usuarios','url'=>array('admin')),
);
?>

<h1>Actualizar Usuario <?php echo $model->id_usuario_sistema; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>