<?php $this->breadcrumbs=array(
  'Usuarios',
);

$this->menu=array(
  array('label'=>'Crear Usuario','url'=>array('create')),
  array('label'=>'Administración de Usuarios','url'=>array('admin')),
); ?>

<h1>Usuarios</h1>

<?php $this->widget('booster.widgets.TbListView',array(
  'dataProvider'=>$dataProvider,
  'itemView'=>'_view',
)); ?>