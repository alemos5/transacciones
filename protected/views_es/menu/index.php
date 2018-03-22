<?php $this->breadcrumbs=array(
  'Menus',
);

$this->menu=array(
  array('label'=>'Crear Menu','url'=>array('create')),
  array('label'=>'Administración de Menus','url'=>array('admin')),
);
?>

<h1>Menus</h1>

<?php $this->widget('booster.widgets.TbListView',array(
  'dataProvider'=>$dataProvider,
  'itemView'=>'_view',
)); ?>