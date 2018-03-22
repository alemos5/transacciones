<?php $this->breadcrumbs=array(
  'Menus'=>array('index'),
  $model->id_menu_sistema=>array('view','id'=>$model->id_menu_sistema),
  'Actualizar',
);
  
$this->menu=array(
  array('label'=>'Lista de Menus','url'=>array('index')),
  array('label'=>'Crear Menu','url'=>array('create')),
  array('label'=>'Ver Menu','url'=>array('view','id'=>$model->id_menu_sistema)),
  array('label'=>'Administración de Menus','url'=>array('admin')),
); ?>
  
<h1>Actualizar Menu <?php echo $model->id_menu_sistema; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>