<?php $this->breadcrumbs=array(
  'Usuarios'=>array('index'),
  'Crear',
);

$this->menu=array(
  array('label'=>'List Users','url'=>array('index')),
  array('label'=>'Manage Users','url'=>array('admin')),
); ?>

<h1>Create User</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>