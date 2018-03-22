<?php $this->breadcrumbs=array(
  'Usuarios'=>array('index'),
  $model->id_usuario_sistema,
);

$this->menu=array(
  array('label'=>'List User','url'=>array('index')),
  array('label'=>'Create User','url'=>array('create')),
  array('label'=>'Update User','url'=>array('update','id'=>$model->id_usuario_sistema)),
  array('label'=>'Delete User','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_usuario_sistema),'confirm'=>'Estas seguro de eliminar el usuario '.$model->usuario.'?')),
  array('label'=>'Manage Users','url'=>array('admin')),
);
$estatus = array('Inactivo', 'Activo');
$date = new Date();
$sexo = array('M' => 'Masculino', 'F'=>'Femenino' ); ?>

<h1>Check User #<?php echo $model->id_usuario_sistema; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
  'data'=>$model,
  'attributes'=>array(
    'cedula',
    'usuario',
    'primer_nombre',
    'segundo_nombre',
    'primer_apellido',
    'segundo_apellido',
    array(
      'label'=>'System Profile',
      'type'=>'raw',
      'value'=>CHtml::encode($model->idPerfilSistema->nombre),
    ),
    array(
      'label'=>'Birthday',
      'type'=>'raw',
      'value'=>CHtml::encode($date->convertDateEnToEs($model->fecha_nacimiento)),
    ),
    array(
      'label'=>'Gender',
      'type'=>'raw',
      'value'=>CHtml::encode($sexo[$model->sexo]),
    ),
    array(
      'label'=>'Status',
      'type'=>'raw',
      'value'=>CHtml::encode($estatus[$model->estatus]),
    ),
    array(
      'label'=>'Password Status',
      'type'=>'raw',
      'value'=>CHtml::encode($estatus[$model->estatus_contrasena]),
    ),
    'observacion_personal',
  ),
)); ?>