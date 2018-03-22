<?php
$this->breadcrumbs=array(
  'Perfiles'=>array('index'),
  'Crear',
);

$this->menu=array(
array('label'=>'Lista de Perfiles','url'=>array('index')),
array('label'=>'Administración de Perfiles','url'=>array('admin')),
);
?>

<h1>Crear Perfil</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>