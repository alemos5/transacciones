<?php $this->breadcrumbs=array(
  'Menus'=>array('index'),
  'Crear',
);

$this->menu=array(
  array('label'=>'Lista de Menus','url'=>array('index')),
  array('label'=>'Administración de Menus','url'=>array('admin')),
);
?>

<h1>Crear Menu</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>