<?php
$this->breadcrumbs=array(
  'Usuarios'=>array('index'),
  $model->id_usuario_sistema=>array('view','id'=>$model->id_usuario_sistema),
  'Actualizar',
);

$this->menu=array(
  array('label'=>'List Users','url'=>array('index')),
  array('label'=>'Create User','url'=>array('create')),
  array('label'=>'Check User','url'=>array('view','id'=>$model->id_usuario_sistema)),
  array('label'=>'Manage Users','url'=>array('admin')),
);
?>

<h1>Update User <?php echo $model->id_usuario_sistema; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>