<?php $this->breadcrumbs=array(
  'Usuarios'=>array('index'),
  'Crear',
);

$this->menu=array(
  array('label'=>'Lista de Usuario','url'=>array('index')),
  array('label'=>'Administración de Usuarios','url'=>array('admin')),
); ?>

<h1>Crear Usuario</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>