<?php
$this->breadcrumbs=array(
  'Perfiles',
);

$this->menu=array(
  array('label'=>'Crear Perfil','url'=>array('create')),
  array('label'=>'Administración de Perfiles','url'=>array('admin')),
);
?>

<h1>Perfiles</h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
